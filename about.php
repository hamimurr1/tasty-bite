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
    <title>About Us - Tasty Bites</title>

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
          <a class="btn btn-ghost text-xl" href="index.php">
            <i class="fa-solid fa-burger text-orange-500"></i>
            Tasty <span class="text-orange-500">Bites</span>
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
    <!-- About Us Section -->
    <!-- =============================== -->
    <section class="container mx-auto text-center py-16">
      <h1 class="text-4xl font-bold mb-6">About Tasty Bites</h1>
      <p class="max-w-2xl mx-auto text-lg text-gray-600">
        Tasty Bites is your go-to restaurant for delicious pizzas, juicy burgers,
        and mouth-watering grilled dishes. We believe in fresh ingredients,
        fast service, and a cozy atmosphere that makes you feel at home.
      </p>
      <div class="mt-8 flex justify-center gap-6 flex-wrap">
        <img src="https://i.ibb.co/bRB7h664/pizza-pizza-filled-with-tomatoes-salami-olives.jpg"
          class="w-60 rounded-lg shadow-md"/>
        <img src="https://i.ibb.co/V0GkgQj7/double-cheeseburger.jpg"
          class="w-60 rounded-lg shadow-md"/>
      </div>
    </section>

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
