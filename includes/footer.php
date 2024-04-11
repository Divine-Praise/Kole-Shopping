<footer>
   <div class="contents">
      <h2>Exclusive</h2>
      <h3>Subscribe</h3>
      <p>Get 10% off your first order</p>
      <div class="news-letter">
        <form action="#">
          <input type="email" placeholder="Enter your email">
          <button type="submit"><i class='bx bx-send'></i></button>
        </form>
      </div>
   </div>
   <div class="contents">
    <h3>Support</h3>
    <p>111 Bijoy sarani, Dhaka, <br> DH 1515, Bangladesh.</p>
    <p>Kole@contact.com</p>
    <p>+88015-88888 9999</p>
   </div>
   <div class="contents">
    <h3>Account</h3>
    <a href="#">My Account</a>
    <a href="#">Logout</a>
    <a href="#">Cart</a>
    <a href="#">Wishlist</a>
    <a href="#">Shop</a>
   </div>
   <div class="contents">
    <h3>Quick Link</h3>
      <a href="#">Privacy Policy</a>
      <a href="#">Terms Of Use</a>
      <a href="#">FAQ</a>
      <a href="#">Contact</a>
   </div>
   <div class="contents">
    <h3>Download App</h3>
    <p id="apps">Save $3 with App New Users Only</p>
    <div class="app-img">
      <div class="left">
        <img src="./images/Qrcode.png" alt="qrcode">
      </div>
      <div class="right">
        <img src="./images/google play.png" alt="google logo">
        <img src="./images/app store.png" alt="">
      </div>
    </div>
    <div class="social-media">
      <a href="https://www.facebook.com/" target=”_blank”><i class='bx bxl-facebook'></i></a>
      <a href="https://www.twitter.com/" target=”_blank”><i class='bx bxl-twitter' ></i></a>
      <a href="https://www.instagram.com/" target=”_blank”><i class='bx bxl-instagram' ></i></a>
      <a href="https://www.linkedin.com/" target=”_blank”><i class='bx bxl-linkedin' ></i></a>
    </div>
   </div>
</footer>
<div class="copy-right">
  <h5>&copy; Copyright Kole <span id="get-year">XXXX.</span> All right reserved</h5>
</div>

<!-- link javascript -->
<script src="JAVASCRIPT/script.js"></script>
<script src="JAVASCRIPT/cart.js"></script>
<script src="JAVASCRIPT/wishlist.js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script type="text/javascript">

// Initialize Swiper
var swiper = new Swiper(".mySwiper1", {
    grabCursor: true,
    speed: 800,
    loop: true,
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
  },
  autoplay:{
    delay: 5000,
    disableOnInteraction: false,
  }
});

//Initialize Swiper2
var swiper = new Swiper(".mySwiper2", {
  effect: "coverflow",
  grabCursor: true,
  loop: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 150,
    modifier: 2.5,
    slideShadows: true,
  },
  pagination: {
    el: ".swiper-pagination2",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  }
});

//Initialize Swiper3
var swiper = new Swiper(".mySwiper3", {
  slidesPerView: 6,
  centeredSlides: false,
  spaceBetween: 30,
  loop: true,
  grabCursor: false,
  pagination: {
    el: ".swiper-pagination3",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay:{
    delay: 4000,
    disableOnInteraction: false,
  }
});

//Initialize Swiper4
var swiper = new Swiper('.swiper-container', {
        effect: 'cube',
        grabCursor: true,
        loop: true,
        speed: 2000,
        cubeEffect: {
            shadow: false,
            slideShadows: true,
            shadowOffset: 20,
            shadowScale: 0.94,
        },
        autoplay:{
          delay: 4000,
          disableOnInteraction: false,
        }
    });




// console.log("i am fking working");

  </script>

</body>
</html>