<?php 

// Title
$page_title = "Home Page";

//Include header.php from includes folder
include('includes/header.php');

//Include news.php from includes folder
include('includes/news.php'); 

//Include navbar.php from includes folder
include('includes/navbar.php');

// Include sidebar.php from includes folder
include('includes/sidebar.php');

?>

<!-- ==========================today's sale============================================== -->
<div class="today">
    <div class="box"></div>
    <p>Today's</p>
</div>

<!-- =================================== Flash sales ============================ -->
<div class="flash_sales">
    <div class="left">
        <h2>Flash Sales</h2>
    </div>
    <div class="right">
        <div class="date">
            <div class="time">
                <p>Days</p>
                <h2 id="days">00</h2>
            </div>
        </div>
        <div class="time_span">
                <span>:</span>
            </div>
        <div class="date">
            <div class="time">
                <p>Hours</p>
                <h2 id="hours">00</h2>
            </div>
        </div>
        <div class="time_span">
                <span>:</span>
            </div>
        <div class="date">
            <div class="time">
                <p>Minutes</p>
                <h2 id="minutes">00</h2>
            </div>
        </div>
        <div class="time_span">
                <span>:</span>
            </div>
        <div class="date">
            <div class="time">
                <p>Seconds</p>
                <h2 id="seconds">00</h2>
            </div>
        </div>
    </div>
</div>

<!-- ===================================Product============================ -->
<div class="product-product">
    <div class="slider-btns">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <div class="product-container">
    <div class="swiper mySwiper2">
        <div class="swiper-wrapper">

        <!-- product box -->
            <div class="product swiper-slide">
                <div class="top">
                    <div class="top-info">
                        <div class="percent-off">
                            <p class="poff">-40%</p>
                        </div>
                        <div class="product-option">
                           
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/game pad.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name ">HAVIT HV-G92 Gamepad</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    <span class="numbers-of-rating">(88)</span>
                </div>
                </div>
                <p class="shipping-fee" style="display: none;">$0</p>
            </div>
            <div class="product swiper-slide">
                <div class="top">
                    <div class="top-info">
                        <div class="percent-off">
                            <p class="poff">-35%</p>
                        </div>
                        <div class="product-option">
                            
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/keyboard.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">AK-900 Wired Keyboard</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <!-- <i class='bx bxs-star'></i> -->
                        </div>
                    <span class="numbers-of-rating">(75)</span>
                </div>
                </div>
                <p class="shipping-fee" style="display: none;">$10</p>
            </div>
            <div class="product swiper-slide">
                <div class="top">
                    <div class="top-info">
                        <div class="percent-off">
                            <p class="poff">-30%</p>
                        </div>
                        <div class="product-option">
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/monitor.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">IPS LCD Gaming Monitor</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    <span class="numbers-of-rating">(99)</span>
                </div>
                </div>
            </div>
            <div class="product swiper-slide">
                <div class="top">
                    <div class="top-info">
                        <div class="percent-off">
                            <p class="poff">-25%</p>
                        </div>
                        <div class="product-option">
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/chair.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">S-Series Comfort Chair </h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    <span class="numbers-of-rating">(88)</span>
                </div>
                </div>
            </div>
            <div class="product swiper-slide">
                <div class="top">
                    <div class="top-info">
                        <div class="percent-off">
                            <p class="poff">-34%</p>
                        </div>
                        <div class="product-option">
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/gucci hand bag.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">Gucci duffle bag</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star-half' ></i>
                        </div>
                    <span class="numbers-of-rating">(88)</span>
                </div>
                </div>
            </div>
            <div class="product swiper-slide">
                <div class="top">
                    <div class="top-info">
                        <div class="percent-off">
                            <p class="poff">-25%</p>
                        </div>
                        <div class="product-option">
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/chair.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">S-Series Comfort Chair </h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    <span class="numbers-of-rating">(88)</span>
                </div>
                </div>
            </div>
            <div class="product swiper-slide">
                <div class="top">
                    <div class="top-info">
                        <div class="percent-off">
                            <p class="poff">-35%</p>
                        </div>
                        <div class="product-option">
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/keyboard.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">AK-900 Wired Keyboard</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <!-- <i class='bx bxs-star'></i> -->
                        </div>
                    <span class="numbers-of-rating">(75)</span>
                </div>
                </div>
            </div>
            <div class="product swiper-slide">
                <div class="top">
                    <div class="top-info">
                        <div class="percent-off">
                            <p class="poff">-30%</p>
                        </div>
                        <div class="product-option">
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/monitor.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">IPS LCD Gaming Monitor</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    <span class="numbers-of-rating">(99)</span>
                </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination2"></div>
    </div>
</div>
</div>

<!-- view more btn -->
<div class="view-more-btn">
    <a href="#" type="button" >View All Product</a>
</div>

    <!-- ========================== Category sale============================================== -->
 <div class="category">
    <div class="today">
        <div class="box"></div>
        <p>Categories</p>
    </div>
    <div class="topic-left">
        <h2>Browse By Category</h2>
    </div>
    <div class="slider-btns">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <div class="category-it">
    <div class="category-container">
        <div class="swiper mySwiper3">
            <div class="swiper-wrapper">

            <!-- product box -->
                <a href="#" class="category-brand swiper-slide"><div>
                    <i class='bx bx-mobile-alt'></i>
                    <p>Phones</p>
                </div></a>
                <a href="#" class="category-brand swiper-slide"><div>
                    <i class="fa-solid fa-computer"></i>
                    <p>Computers</p>
                </div></a>
                <a href="#" class="category-brand swiper-slide"><div>
                    <i class='bx bxs-watch-alt' ></i>
                    <p>SmartWatch</p>
                </div></a>
                <a href="#" class="category-brand swiper-slide"><div>
                    <i class='bx bx-camera' ></i>
                    <p>Camera</p>
                </div></a>
                <a href="#" class="category-brand swiper-slide"><div>
                    <i class='bx bx-headphone' ></i>
                    <p>HeadPhones</p>
                </div></a>
                <a href="#" class="category-brand swiper-slide"><div>
                    <i class="fa-solid fa-gamepad"></i>
                    <p>Gaming</p>
                </div></a>
                <a href="#" class="category-brand swiper-slide"><div>
                    <i class='bx bx-camera' ></i>
                    <p>Camera</p>
                </div></a>
                <a href="#" class="category-brand swiper-slide"><div>
                    <i class='bx bx-headphone' ></i>
                    <p>HeadPhones</p>
                </div></a>
            </div>
            <div class="swiper-pagination3"></div>
        </div>
    </div>
    </div>
 </div>

<!-- ======================================= best selling ====================== -->
 <div class="today">
    <div class="box"></div>
    <p>This Month</p>
</div>
<div class="topic-left">
    <h2>Best Selling Products</h2>
</div>
<div class="view-btn">
    <a href="#"><button type="button">View All</button></a>
</div>
<!-- product box -->
<div class="product-container2 p2">
        <div class="product">
            <div class="top">
                <div class="top-info">
                    <div class="disabled">
                        <!-- <p>-40%</p> -->
                    </div>
                    <div class="product-option">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>
                <div class="product-img">
                    <img src="./images/pink Jacket.png" alt="product image" class="product-image">
                </div>
            </div>
            <i class='bx bx-heart wish-heart trash' ></i>
            <button type="button" class="add-cart">Add To Cart</button>
            <div class="bottom">
                <h3 class="product-name">The north coat</h3>
                <div class="prices">
                    <p class="product-price">$120</p>
                    <span class="old-price"><s>$160</s></span>
                </div>
                <div class="rating">
                    <div class="I">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                    <span class="numbers-of-rating">(65)</span>
                </div>
            </div>
        </div>
        <div class="product">
            <div class="top">
                <div class="top-info">
                    <div class="disabled">
                        <!-- <p>-40%</p> -->
                    </div>
                    <div class="product-option">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>
                <div class="product-img">
                    <img src="./images/gucci hand bag.png" alt="product image" class="product-image">
                </div>
            </div>
            <i class='bx bx-heart wish-heart trash' ></i>
            <button type="button" class="add-cart">Add To Cart</button>
            <div class="bottom">
                <h3 class="product-name">Gucci duffle bag</h3>
                <div class="prices">
                    <p class="product-price">$120</p>
                    <span class="old-price"><s>$160</s></span>
                </div>
                <div class="rating">
                    <div class="I">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half'></i>
                    </div>
                    <span class="numbers-of-rating">(88)</span>
                </div>
            </div>
        </div>
        <div class="product">
            <div class="top">
                <div class="top-info">
                    <div class="disabled">
                        <!-- <p>-40%</p> -->
                    </div>
                    <div class="product-option">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>
                <div class="product-img">
                    <img src="./images/game pad.png" alt="product image" class="product-image">
                </div>
            </div>
            <i class='bx bx-heart wish-heart trash' ></i>
            <button type="button" class="add-cart">Add To Cart</button>
            <div class="bottom">
                <h3 class="product-name">HAVIT HV-G92 Gamepad</h3>
                <div class="prices">
                    <p class="product-price">$120</p>
                    <span class="old-price"><s>$160</s></span>
                </div>
                <div class="rating">
                    <div class="I">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half'></i>
                    </div>
                    <span class="numbers-of-rating">(68)</span>
                </div>
            </div>
        </div>
        <div class="product">
            <div class="top">
                <div class="top-info">
                    <div class="disabled">
                        <!-- <p>-40%</p> -->
                    </div>
                    <div class="product-option">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>
                <div class="product-img">
                    <img src="./images/sheff.png" alt="product image" class="product-image">
                </div>
            </div>
            <i class='bx bx-heart wish-heart trash' ></i>
            <button type="button" class="add-cart">Add To Cart</button>
            <div class="bottom">
                <h3 class="product-name">Small BookSelf</h3>
                <p class="product-price">$360 
                    <span class="old-price disabled">
                        <!-- <s>$160</s> -->
                    </span>
                </p>
                <div class="rating">
                    <div class="I">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                    <span class="numbers-of-rating">(84)</span>
                </div>
            </div>
        </div>
</div>


<!-- ==================================== NEWS CATEGORY =====================================  -->
<div class="news-category">
    <div class="left">
        <p>Categories</p>
        <h1>Enhance Your <br> Music Experience</h1>
        <div class="news-category-countdown">
            <div class="date">
                <h3 id="days2">00</h3>
                <p>Days</p>
            </div>
            <div class="date">
                <h3 id="hr2">00</h3>
                <p>Hours</p>
            </div>
            <div class="date">
                <h3 id="min2">00</h3>
                <p>Minutes</p>
            </div>
            <div class="date">
                <h3 id="sec2">00</h3>
                <p>Seconds</p>
            </div>
        </div>
        <a href="#">Buy Now!</a>
    </div>
    <div class="right">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="./images/JBL.png" alt="brand image">
                </div>
                <div class="swiper-slide">
                    <img src="./images/JBL3.png" alt="brand image">
                </div>
                <div class="swiper-slide">
                    <img src="./images/JBL.png" alt="brand image">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======================================== Our Product ============================ -->
<div class="today">
    <div class="box"></div>
    <p>Our Products</p>
</div>
<div class="topic-left">
    <h2>Explore Our Products</h2>
</div>
<div class="view-btn">
    <a href="#"><button type="button">View All Product</button></a>
</div>

<!-- products---------- -->
<div class="our-product-container">

    <!-- --------------- list 1------------- -->
    <div class="product-container2 p3">
            <div class="product">
                <div class="top">
                    <div class="top-info">
                        <div class="disabled">
                            <p class="poff"></p>
                        </div>
                        <div class="product-option">
                           
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/dog dry feed.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">Breed Dry Dog Food</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star empty'></i>
                            <i class='bx bxs-star empty'></i>
                        </div>
                        <span class="numbers-of-rating">(35)</span>
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="top">
                    <div class="top-info">
                        <div class="disabled">
                            <!-- <p>-40%</p> -->
                        </div>
                        <div class="product-option">
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/camera.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">CANON EOS DSLR Camera</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star empty'></i>
                        </div>
                        <span class="numbers-of-rating">(95)</span>
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="top">
                    <div class="top-info">
                        <div class="disabled">
                            <!-- <p>-40%</p> -->
                        </div>
                        <div class="product-option">
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/laptop.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">ASUS FHD Gaming Laptop</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <span class="numbers-of-rating">(325)</span>
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="top">
                    <div class="top-info">
                        <div class="disabled">
                            <p class="poff"></p>
                        </div>
                        <div class="product-option">
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/pef.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">Curology Product Set</h3>
                    <p class="product-price">$500 
                        <span class="old-price disabled">
                            <!-- <s>$160</s> -->
                        </span>
                    </p>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star empty'></i>
                        </div>
                        <span class="numbers-of-rating">(145)</span>
                    </div>
                </div>
            </div>
    </div>

    <!-- --------------- list 2------------- -->
    <div class="product-container2 p3">
            <div class="product">
                <div class="top">
                    <div class="top-info">
                        <div class="percent-off new">
                            <p class="poff">NEW</p>
                        </div>
                        <div class="product-option">
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/kid car.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">Kids Electric Car</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <span class="numbers-of-rating">(65)</span>
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="top">
                    <div class="top-info">
                        <div class="disabled">
                            <!-- <p>-40%</p> -->
                        </div>
                        <div class="product-option">
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/boot.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">Jr. Zoom Soccer Cleats</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <span class="numbers-of-rating">(98)</span>
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="top">
                    <div class="top-info">
                        <div class="percent-off new">
                            <p class="poff">NEW</p>
                        </div>
                        <div class="product-option">
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/mobile phone game pad.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">GP11 Shooter USB Gamepad</h3>
                    <div class="prices">
                        <p class="product-price">$120</p>
                        <span class="old-price"><s>$160</s></span>
                    </div>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star-half'></i>
                        </div>
                        <span class="numbers-of-rating">(55)</span>
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="top">
                    <div class="top-info">
                        <div class="disabled">
                            <!-- <p>-40%</p> -->
                        </div>
                        <div class="product-option">
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="./images/Men Jacket.png" alt="product image" class="product-image">
                    </div>
                </div>
                <i class='bx bx-heart wish-heart trash' ></i>
                <button type="button" class="add-cart">Add To Cart</button>
                <div class="bottom">
                    <h3 class="product-name">Quilted Satin Jacket</h3>
                    <p class="product-price">$480 
                        <span class="old-price disabled">
                            <!-- <s>$160</s> -->
                        </span>
                    </p>
                    <div class="rating">
                        <div class="I">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star-half'></i>
                        </div>
                        <span class="numbers-of-rating">(74)</span>
                    </div>
                </div>
            </div>
    </div>

    <!-- view more btn -->
    <div class="view-more-btn off-border">
        <a href="#" type="button" >View All Product</a>
    </div>

</div>

<!-- ======================================== NEW ARRIVALS ========================================== -->
<div class="today">
    <div class="box"></div>
    <p>Featured</p>
</div>
<div class="topic-left">
    <h2>New Arrival</h2>
</div>

<!-- new arrivals -->
<div class="new-arrivals">
    <div class="left">
        <div class="position">
            <h3>PlayStation 5</h3>
            <p>Black and White version of the PS5 <br /> coming out on sale.</p>
            <a href="#">Shop Now!</a>
        </div>
    </div>
    <div class="right">
        <div class="top">
            <div class="position">
                <h3>Women s Collections</h3>
                <p>Featured woman collections that <br> give you another vibe. <br><br>
                <a href="#">Shop Now!</a>
            </div>
        </div>
        <div class="bottom">
            <div class="left">
                <div class="position">
                    <h3>Speakers</h3>
                    <p>Amazon wireless speakers</p>
                    <a href="#">Shop Now!</a>
                </div>
            </div>
            <div class="right">
                <div class="position">
                    <h3>Perfume</h3>
                    <p>GUCCI INTENSE OUD EDP</p>
                    <a href="#">Shop Now!</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================ MOTTO: =========================== -->
<div class="motto">
    <div class="box">
        <div class="top">
            <i class="fa-solid fa-truck"></i>
        </div>
        <div class="bottom">
            <h3>FREE AND FAST DELIVERY</h3>
            <p>Free delivery for all orders over $140</p>
        </div>
    </div>
    <div class="box">
        <div class="top">
            <i class='bx bx-headphone' ></i>
        </div>
        <div class="bottom">
            <h3>24/7 CUSTOMER SERVICE</h3>
            <p>Friendly 24/7 customer support</p>
        </div>
    </div>
    <div class="box">
        <div class="top">
            <i class='bx bx-check-shield' ></i>
        </div>
        <div class="bottom">
            <h3>MONEY BACK GUARANTEE</h3>
            <p>We return money within 30 days</p>
        </div>
    </div>
</div>
<div class="scroll-top">
<i class='bx bx-right-arrow-alt' onclick="scrolltop()"></i>
</div>

<!-- icons -->
<!-- <i class="bx bx-star"></i> -->
<!-- <i class='bx bxs-star'></i> -->
<!-- <i class='bx bxs-star-half'></i> -->
<!-- <i class='bx bx-right-arrow-alt'></i> -->
<!-- <i class='bx bx-mobile-alt'></i> -->
<!-- <i class="fa-solid fa-computer"></i> -->
<!-- <i class='bx bxs-watch-alt' ></i> -->
<!-- <i class='bx bx-camera' ></i> -->
<!-- <i class='bx bx-headphone' ></i> -->
<!-- <i class="fa-solid fa-gamepad"></i> -->
<!-- <i class="fa-regular fa-eye"></i> -->
<!-- <i class="fa-solid fa-eye"></i> -->
<!-- <i class='bx bx-check-shield' ></i> -->
<!-- <i class='bx bx-send'></i> -->
<!-- <i class="fa-solid fa-truck"></i> -->

<?php include('includes/footer.php'); ?>