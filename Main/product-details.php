<?php
    // Check if the product ID is provided in the URL
    if (isset($_GET["productid"])) {
        // Retrieve the product ID from the URL
        $product_id = $_GET["productid"];

        // Here, you can use the product ID to fetch the product details from the database or perform any other operation you need.
        include "../Home/database/conn.php";
        if($con)
    {
      $sql = "SELECT * FROM `products` Where product_id = $product_id"; 
      $result = mysqli_query($con,$sql);
      while($data = mysqli_fetch_assoc($result))
       { 
   ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details - Green Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <style>
    /* Define the custom CSS class "custom-bullet-list" */
.custom-bullet-list {
    list-style: none; /* Remove default bullet points */
    padding-left: 20px; /* Add some space between the bullet point and the text */
}

/* Define the custom style for the bullet points using ::before pseudo-element */
.custom-bullet-list li::before {
    content: "\2022"; /* Unicode character for bullet point (•) */
    color: green; /* Set the desired color for the bullet points */
    display: inline-block;
    width: 1em; /* Adjust the width of the bullet point */
    margin-left: -1em; /* Set negative margin to align the bullet point properly */
}
    </style>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green - v4.10.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h6 class="logo me-auto"><a href="index.html">Fly High Papers </a></h6>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      
      <nav id="navbar" class="navbar">
      <ul>
          <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="index.html#about">About Paper</a></li>
          <li><a class="nav-link scrollto " href="index.html#story">Our Story</a></li>          
          <li><a class="nav-link scrollto " href="index.html#services">Services</a></li>  
          <li><a class="nav-link scrollto" href="index.html#products">Gallery</a></li>        
          <li><a class="nav-link scrollto" href="product.php">Shop</a></li>
          <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="../home/index.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo $data["product_name"]; ?></h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Product Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/products/<?php echo $data["image"]; ?>" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/products/<?php echo $data["image"]; ?>" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/products/<?php echo $data["image"]; ?>" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
              <div class="container portfolio-description" style = "background-color:RGB(255,225,255);padding:25px">
              <h3><strong>Description</strong><h3>
                <br>
              <h5><p><?php echo $data["description"]; ?> </p></strong><h5>
            </div>
            </div>
            
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" style = "background-color:RGB(235,214,138);">
              <!-- <h2><?php echo $data["product_name"]; ?></h2> -->
              <br>
              <ul>
                <h3>Product details</h3>
                <h5><li>GSM     :- <strong><?php echo $data["gsm"]; ?></strong></li><h5>
                <h5><li>Color   :- <strong><?php echo $data["color"]; ?></strong></li><h5>
                <h5><li>Size    :- <strong><?php echo $data["size"]; ?> inch</strong></li><h5>
                <h5><li>Pack of :- <strong><?php echo $data["packof"]; ?></strong></li><h5>
                <h5><li>Cost    :- ₹ <strong><?php echo $data["cost"]; ?></strong></li><h5>
                  <br>
                <h3>Features</strong><h3>

                  <ul class="custom-bullet-list"> 
                  <h6><li>Made in India</li><h6>
                  <h6><li>Chemical Free Paper </li><h6>
                  <h6><li>Suitable for Printing, Calligraphy, Screenprinting</li><h6>
                  <h6><li>Made with Cotton Rag</li><h6>
                  <h6><li>Eco-Friendly, Acid Free, Tree Free Paper </li><h6>

                  </ul>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Fly High Papers</h3>
      <p>Made with Love, Hardwork, and Compassion</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Fly High Papers</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/green-free-one-page-bootstrap-template/ -->
        Designed by <a href="#">KR Enterprises</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<?php
       }
}
    else{
      ?>
      <script>
        window.alert("Connection Error");
        window.location.href = "product.php";
      </script>

      <?php
    }
} else {
        echo "<p>Product ID not provided.</p>";
    }
    ?>