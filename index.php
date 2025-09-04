<?php
// ===============================
// Database Connection
// ===============================
$servername = "localhost";
$username   = "root";   // default for XAMPP
$password   = "";       // default for XAMPP
$dbname     = "restaurant_db"; // আপনার বানানো DB নাম

$conn = new mysqli($servername, $username, $password, $dbname);

// connection check
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html data-theme="light" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tasty Bites</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              poppins: ["Poppins", "sans-serif"],
            },
            colors: {
              clifford: "#da373d",
              primaryText: "#e02a0f",
              primaryButton: "#db5a19",
              second: "#d9b327",
            },
          },
        },
      };
    </script>

    <!-- DaisyUI -->
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css"
      rel="stylesheet"
      type="text/css"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
  </head>
  <body class="font-poppins">

    <!-- =============================== -->
    <!-- Navbar -->
    <!-- =============================== -->
    <nav>
      <div class="navbar bg-base-100">
        <div class="navbar-start">
          <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 mt-3 w-40 p-2 shadow">
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div>
          <a class="btn btn-ghost text-xl">
            <i class="fa-solid fa-burger text-orange-500"></i>Tasty
            <span class="text-orange-500">Bites</span>
          </a>
        </div>

        <div class="navbar-center hidden lg:flex">
          <ul class="menu menu-horizontal px-1 text-primaryText text-lg">
            <li><a href="index.php" class="hover:bg-black">Home</a></li>
            <li><a href="about.php" class="hover:bg-black">About</a></li>
            <li><a href="contact.php" class="hover:bg-black">Contact</a></li>
          </ul>
        </div>

        <div class="navbar-end">
          <a class="btn bg-primaryButton text-base-100 hover:bg-second w-40">Menu</a>
        </div>
      </div>
    </nav>

    <!-- =============================== -->
    <!-- Hero Section -->
    <!-- =============================== -->
    <div>
      <div class="hero min-h-screen"
        style="background-image: url(https://i.ibb.co/FkWX4LZS/Lucid-Origin-A-vibrant-highresolution-background-image-for-a-m-3.jpg);">
        <div class="hero-overlay"></div>
        <div class="hero-content text-neutral-content text-center">
          <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">Welcome to Tasty Bites</h1>
            <p class="mb-5">
              Delicious food, fast service & best quality – Your hunger ends here!
            </p>
            <button class="btn bg-primaryButton text-base-100 hover:bg-black text-lg">
              Order Now
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- =============================== -->
    <!-- Best Selling Section -->
    <!-- =============================== -->
    <div class="container mx-auto flex justify-center items-center m-3 gap-6">
      <div class="carousel w-96 h-96 rounded-full overflow-hidden">
        <!-- Example carousel images -->
        <div class="carousel-item w-full h-full">
          <img src="https://i.ibb.co/bRB7h664/pizza-pizza-filled-with-tomatoes-salami-olives.jpg"
            class="w-full h-full object-cover rounded-full" />
        </div>
        <div class="carousel-item w-full h-full">
          <img src="https://i.ibb.co/V0GkgQj7/double-cheeseburger.jpg"
            class="w-full h-full object-cover rounded-full" />
        </div>
      </div>

      <div class="max-w-md">
        <h2 class="text-2xl font-bold mb-3">Our Best Selling Items</h2>
        <p class="text-gray-600 mb-4">
          “Delicious pizzas, juicy burgers, and tender grilled chicken — the favorites that keep our customers coming back for more!”
        </p>
      </div>
    </div>

    <!-- =============================== -->
    <!-- Dynamic Menu Section -->
    <!-- =============================== -->
    <div class="container mx-auto mt-12 mb-8 flex flex-wrap gap-5">
      <?php
        $sql = "SELECT * FROM menu";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '
            <div class="card bg-orange-500 w-80 shadow-sm">
              <figure>
                <img src="'.$row["image_url"].'" alt="'.$row["item_name"].'" class="h-48 w-full object-cover"/>
              </figure>
              <div class="card-body">
                <h2 class="card-title text-base-100 font-bold">'.$row["item_name"].'</h2>
                <p class="text-base-100">Price: '.$row["price"].' TK</p>
                <div class="card-actions justify-end">
                  <button class="btn bg-base-100 hover:bg-second">Buy Now</button>
                </div>
              </div>
            </div>
            ';
          }
        } else {
          echo "<p class='text-gray-600'>No menu items found.</p>";
        }
      ?>
    </div>

    <!-- =============================== -->
    <!-- About Section (Included) -->
    <!-- =============================== -->
    <?php include 'about-section.php'; ?>

    <!-- =============================== -->
    <!-- Footer -->
    <!-- =============================== -->
    <footer class="footer sm:footer-horizontal bg-base-200 text-black p-10">
      <img class="w-40 h-30"
        src="https://i.ibb.co/9mXFgc7Q/chicken-skewers-with-slices-sweet-peppers-dill.jpg" alt="" />
      <nav>
        <h6 class="footer-title">Services</h6>
        <a class="link link-hover text-primaryText">Menu</a>
        <a class="link link-hover text-primaryText">Catering</a>
        <a class="link link-hover text-primaryText">Reservations</a>
        <a class="link link-hover text-primaryText">Home Delivery</a>
      </nav>
      <nav>
        <h6 class="footer-title">Company</h6>
        <a class="link link-hover text-primaryText">About us</a>
        <a class="link link-hover text-primaryText">Contact</a>
        <a class="link link-hover text-primaryText">Locations & Hours</a>
        <a class="link link-hover text-primaryText">Press kit</a>
      </nav>
      <nav>
        <h6 class="footer-title">Legal</h6>
        <a class="link link-hover text-primaryText">Terms of use</a>
        <a class="link link-hover text-primaryText">Privacy policy</a>
        <a class="link link-hover text-primaryText">Cookie policy</a>
      </nav>
    </footer>
  </body>
</html>
