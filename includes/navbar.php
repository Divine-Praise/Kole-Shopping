<?php
//Include header.php from includes folder
include('header.php');

?>

<div class="pop-up-msg">
    <div class="poll"></div>
    <div class="message">
    <h3 id="msg-title"></h3>
    <p id="msg-details"></p>
    </div>
    <div class="close-message"><i class='bx bx-x'></i></div>
</div>
<div class="Epop-up-msg">
    <div class="Epoll"></div>
    <div class="Emessage">
    <h3 id="Emsg-title"></h3>
    <p id="Emsg-details"></p>
    </div>
    <div class="Eclose-message"><i class='bx bx-x'></i></div>
</div>

<div class="nav">
    <nav>
        <div class="logo">
            <h3><span>K</span>ole</h3>
        </div>
        <div class="links">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="product.php">Product</a></li>
            </ul>
        </div>
        <div class="search">
            <form action="">
                <input type="text" name="search" id="search" placeholder="What are you looking for?">
                <button type="submit" id=""><i class='bx bx-search icon'></i></button>
            </form>
        </div>
        <div class="nav-icons">
            <div class="bx_cart">
                <i class='bx bx-heart icon' id="wish-icon"></i>
                <span id="wish-list-count">0</span>
            </div>
            <div class="bx_cart">
                <i class='bx bx-cart-alt icon' id="cart-icon"></i>
                <span id="count-items">0</span>
            </div>
            <div class="user-info">
                <i class='bx bx-user icon-user' >
                <div class="acct-info">
                    <a href="#"><div class="user-all-info">
                        <i class='bx bx-user' ></i> 
                        <p>Manage My Account</p>
                    </div></a>
                    <a href="#"><div class="user-all-info">
                        <i class='bx bx-shopping-bag' ></i> 
                        <p>My Order</p>
                    </div></a>
                    <a href="#"><div class="user-all-info">
                        <i class='bx bx-x-circle' ></i> 
                        <p>My Cancellations</p>
                    </div></a>
                    <a href="#"><div class="user-all-info">
                        <i class='bx bx-star' ></i>
                        <p>My Reviews</p>
                    </div></a>
                    <a href="#"><div class="user-all-info">
                        <i class='bx bx-log-out' ></i>
                        <p>Logout</p>
                    </div></a>
                </div>
                </i>
            </div>
        </div>
    </nav>
</div>

<!-- ======================================= CART ================================-->
<div class="cart">
    <?php
        include('news.php');
    ?>

<!-- nav -->
<div class="nav">
    <nav>
        <div class="logo">
            <h3><span>K</span>ole</h3>
        </div>
        <div class="links">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="product.php">Product</a></li>
            </ul>
        </div>
        <div class="search">
            <form action="">
                <input type="text" name="search" id="search" placeholder="What are you looking for?">
                <button type="submit" id=""><i class='bx bx-search icon'></i></button>
            </form>
        </div>
        <div class="nav-icons">
            <div class="bx_cart">
                <i class='bx bx-heart icon' id="wish-icon2"></i>
                <span id="wish-list-count2">0</span>
            </div>
            <div class="bx_cart">
                <i class='bx bx-cart-alt icon' id="cart-icon2"></i>
                <span id="count-items2">0</span>
            </div>
            <div class="user-info">
                <i class='bx bx-user icon-user' >
                <div class="acct-info">
                    <a href="#"><div class="user-all-info">
                        <i class='bx bx-user' ></i> 
                        <p>Manage My Account</p>
                    </div></a>
                    <a href="#"><div class="user-all-info">
                        <i class='bx bx-shopping-bag' ></i> 
                        <p>My Order</p>
                    </div></a>
                    <a href="#"><div class="user-all-info">
                        <i class='bx bx-x-circle' ></i> 
                        <p>My Cancellations</p>
                    </div></a>
                    <a href="#"><div class="user-all-info">
                        <i class='bx bx-star' ></i>
                        <p>My Reviews</p>
                    </div></a>
                    <a href="#"><div class="user-all-info">
                        <i class='bx bx-log-out' ></i>
                        <p>Logout</p>
                    </div></a>
                </div>
                </i>
            </div>
        </div>
    </nav>
</div>

    <!-- page title -->
    <div class="page-title">
        <p>Home / <span>Cart</span></p>
    </div>
    <div class="cart-container">
        <p id="m"></p>
        <!-- product header -->
        <div class="cart-header">
            <p id="header-product">Product</p>
            <p id="header-price">Price</p>
            <p>Quantity</p>
            <p id="sub-total">Subtotal</p>
        </div>


        <!-- cart product -->
        <div class="cart-content">
        
        </div>
    </div>

    <!-- return button  -->
    <div class="return-to-shop">
        <button type="button" onclick="removeCart()">Return To Shop</button>
        <button type="button">Update Cart</button>
    </div>

    <!-- cart product summary -->
    <div class="total-coupon">
        <div class="left">
            <input type="text" name="coupon" id="coupon" placeholder="Coupon Code">
            <button type="button">Apply Coupon</button>
        </div>
        <div class="right">
            <div class="cart-summary">
                <h2>Cart Total</h2>
                <div class="content-summary">
                    <h3 class="summary-sub-total">Subtotal:</h3>
                    <p class="total-sum1-price">$0</p>
                </div>
                <div class="content-summary">
                    <h3 class="summary-shipping-fee">Shipping:</h3>
                    <p class="shipFee">$0</p>
                </div>
                <div class="content-summary ttt">
                    <h3 class="overall-total">Total:</h3>
                    <p class="main-total">$0</p>
                </div>
                <div class="proceed-button">
                    <a href="#" class="btn-buy">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
    

    <!-- footer -->
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
  <h5>&copy; Copyright Kole <span id="get-year2">XXXX.</span> All right reserved</h5>
</div>
</div>

<!-- ========================================== WISH LIST ======================================= -->
<div class="wish-list">
    <?php
       include('news.php');
    ?>

    <!-- Nav -->
    <div class="nav">
        <nav>
            <div class="logo">
                <h3><span>K</span>ole</h3>
            </div>
            <div class="links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="./about.php">About</a></li>
                    <li><a href="product.php">Product</a></li>
                </ul>
            </div>
            <div class="search">
                <form action="">
                    <input type="text" name="search" id="search" placeholder="What are you looking for?">
                    <button type="submit" id=""><i class='bx bx-search icon'></i></button>
                </form>
            </div>
            <div class="nav-icons">
                <div class="bx_cart">
                    <i class='bx bx-heart icon' id="wish-icon3"></i>
                    <span id="wish-list-count3">0</span>
                </div>
                <div class="bx_cart">
                    <i class='bx bx-cart-alt icon' id="cart-icon3"></i>
                    <span id="count-items3">0</span>
                </div>
                <div class="user-info">
                    <i class='bx bx-user icon-user' >
                    <div class="acct-info">
                        <a href="#"><div class="user-all-info">
                            <i class='bx bx-user' ></i> 
                            <p>Manage My Account</p>
                        </div></a>
                        <a href="#"><div class="user-all-info">
                            <i class='bx bx-shopping-bag' ></i> 
                            <p>My Order</p>
                        </div></a>
                        <a href="#"><div class="user-all-info">
                            <i class='bx bx-x-circle' ></i> 
                            <p>My Cancellations</p>
                        </div></a>
                        <a href="#"><div class="user-all-info">
                            <i class='bx bx-star' ></i>
                            <p>My Reviews</p>
                        </div></a>
                        <a href="#"><div class="user-all-info">
                            <i class='bx bx-log-out' ></i>
                            <p>Logout</p>
                        </div></a>
                    </div>
                    </i>
                </div>
            </div>
        </nav>
    </div>


    <!-- page title -->
    <div class="wish-page-title">
        <p>Wish List(<span id="count-wish">0</span>)</p>
        <button type="button">Move All To Bag</button>
    </div>

    <p class="mm"></p>
    <div class="wish-box-container">
        <div class="wishlist-empty-msg" style="display: none;">Your wishlist is empty.</div>
    </div>
    


    <!-- footer -->
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
        <h5>&copy; Copyright Kole <span id="get-year3">XXXX.</span> All right reserved</h5>
    </div>
</div>


<!-- icons -->
<!-- <i class='bx bx-search'></i> -->
<!-- <i class='bx bx-heart' ></i> -->
<!-- <i class='bx bx-cart-alt' ></i> -->
<!-- <i class='bx bx-user' ></i> -->
<!-- <i class='bx bx-shopping-bag' ></i> -->
<!-- <i class='bx bx-x-circle' ></i> -->
<!-- <i class='bx bx-star' ></i> -->
<!-- <i class='bx bx-log-out' ></i> -->
