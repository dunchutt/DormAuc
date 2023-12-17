<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ... (your head content) ... -->
</head>

<body>

  <!-- ... (your body content) ... -->

  <footer style="margin-top: 40px; margin-bottom: 0;">
    <div class="footer-category">
      <div class="container">
        <!-- ... (your category boxes) ... -->

        <ul class="footer-nav-list" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
          <li class="footer-nav-item" style="flex-basis: 48%; margin-bottom: 10px;">
            <h2 class="nav-title" style="Color: #FFB485;">Contact</h2>
          </li>

          <li class="footer-nav-item flex" style="flex-basis: 48%; margin-bottom: 10px;">
            <div class="icon-box" style="margin-right: 5px;">
              <ion-icon name="location-outline"></ion-icon>
            </div>
            <!-- Address -->
            
              <a href="80 Daehak-Ro, Bukgu, Daegu, South Korea" class="footer-nav-link"><?php echo ($site_address); ?></a>
            
          </li>

          <li class="footer-nav-item flex" style="flex-basis: 48%; margin-bottom: 10px;">
            <div class="icon-box" style="margin-right: 5px;">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+607936-8058" class="footer-nav-link"><?php echo ($site_contact_num); ?></a>
          </li>

          <li class="footer-nav-item flex" style="flex-basis: 48%; margin-bottom: 10px;">
            <div class="icon-box" style="margin-right: 5px;">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:<?php echo($site_info_email); ?>" class="footer-nav-link"><?php echo($site_info_email); ?></a>
          </li>
        </ul>

        <ul class="footer-nav-list" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
          <li class="footer-nav-item" style="flex-basis: 65%; margin-bottom: 10px;">
            <h2 class="nav-title" style="Color: #FFB485;">Follow Us</h2>
          </li>

          <li>
            <ul class="social-link" style="display: flex; justify-content: space-around;">
              <li class="footer-nav-item" style="margin-right: 10px;">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item" style="margin-right: 10px;">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item" style="margin-right: 10px;">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item" style="margin-right: 10px;">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <!-- ... (your payment image) ... -->
        <p class="copyright">
          Copyright &copy; <a href="#"><?php echo $_SESSION['web-footer']; ?></a> all rights reserved.
        </p>
      </div>
    </div>
  </footer>


    <!--
    - custom js link
  -->
    <!-- <script src="./assets/js/script.js"></script> -->
    <script src="./js/notification.js"></script>
    <script src="./js/mobilemenu.js"></script>
    <script src="./js/datamodal.js"></script>
    <script src="./js/dataaccordion.js"></script>
    <script src="./ajax/I.js"></script>
    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
	<script src="./js/jquery.js" type="text/javascript"></script>
	<script src="./js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./js/electricshop.js"></script>
	<script src="./js/main.js"></script>
  
  </body>

</html>

