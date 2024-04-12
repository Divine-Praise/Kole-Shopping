// // add cart
var wishPage = document.querySelector('.wish-list');
var wishIcon = document.querySelector('#wish-icon');
var cart1 = document.querySelector('.cart');

function removeWish()
{
    wishPage.classList.toggle('active');
};

wishIcon.addEventListener('click', ()=>
{
    // console.log("i am working");
    wishPage.classList.toggle('active');
});

var wishIcon2 = document.querySelector('#wish-icon2');
wishIcon2.addEventListener('click', ()=>
{
    // console.log("i am working");
    cart1.classList.remove('active');
    wishPage.classList.toggle('active');
});

var wishIcon3 = document.querySelector('#wish-icon3');
wishIcon3.addEventListener('click', ()=>
{
    // console.log("i am working");
    wishPage.classList.toggle('active');
});

//cart Working js
if (document.readyState == 'loading'){
    document.addEventListener("DOMContentLoaded", ready);
  } else{
    ready();
  }

function ready(){

    //Add Wish 
    var addWishList = document.getElementsByClassName('wish-heart');
    for(var i = 0; i < addWishList.length; i++){
        var button = addWishList[i];
        button.addEventListener('click', addWishClicked);
    }

    countWish();
}

function addWishClicked(event){
    var button = event.target;
    button.style.color = "#fff";
    button.style.backgroundColor = "#db4444";
    var shopProducts = button.parentElement;
    var productTitle = shopProducts.getElementsByClassName('product-name')[0].innerText;
    var productPrice = shopProducts.getElementsByClassName('product-price')[0].innerText;
    var productOldPrice = shopProducts.getElementsByClassName('old-price')[0].innerText;
    var productImg = shopProducts.getElementsByClassName('product-image')[0].src;
    var productDiscount = shopProducts.getElementsByClassName('poff')[0].innerText;
    addItemToWish(productTitle, productPrice, productOldPrice, productImg, productDiscount);
    updatetotal();
    updateSubTotal();
}

function countWish(){
    var wishList = document.getElementsByClassName('wish-product');
    var countItem = document.getElementById('wish-list-count');
    countItem.innerHTML = wishList.length;

    // Show or hide wishlist empty message
    var wishlistEmptyMsg = document.querySelector('.wishlist-empty-msg');
    var wishReturn = document.querySelector('.wish-return');
    var move = document.querySelector('.move');

    if (wishList.length === 0) {
        wishlistEmptyMsg.style.display = 'block';
        wishReturn.style.display = 'none';
        move.style.display = 'none';
    } else {
        wishlistEmptyMsg.style.display = 'none';
        wishReturn.style.display = 'block';
        move.style.display = 'block';
    }
    //  console.log(countItem);
  }
  
  function countWishTwo(){
    var wishList = document.getElementsByClassName('wish-product');
    var countItem = document.getElementById('wish-list-count2');
    countItem.innerHTML = wishList.length;
  }
  
  function countWishThree(){
    var wishList = document.getElementsByClassName('wish-product');
    var countItem = document.getElementById('wish-list-count3');
    countItem.innerHTML = wishList.length;
  }

function countWishFour(){
    var wishList = document.getElementsByClassName('wish-product');
    var countItem = document.getElementById('count-wish');
    countItem.innerHTML = wishList.length;
}

// var addCartButtons;
// var deleteWishList;

function addItemToWish(productTitle, productPrice, productOldPrice, productImg, productDiscount){
    var wishShopBox = document.createElement('div');
    wishShopBox.classList.add('wish-product');
  
    var wishItems = document.getElementsByClassName('wish-box-container')[0];
    var wishItemsNames = wishItems.getElementsByClassName('wish-product-name');
  
    // deny adding to cart if want to add the same product to cart
    for (var i = 0; i < wishItemsNames.length; i++){
        if (wishItemsNames[i].innerText == productTitle){
          WLEMsg();
          return;
        }
        
    }
  
    var wishBoxContent = `
                        <div class="top">
                            <div class="top-info">
                                <div class="percent-off">
                                    <p class="disp">${productDiscount}</p>
                                </div>
                                <div class="product-option">
                                    <i class="fa-regular fa-eye"></i>
                                </div>
                            </div>
                            <div class="product-img">
                                <img src="${productImg}" alt="product image" class="product-image">
                            </div>
                        </div>
                            <i class='bx bxs-trash del2 trash' ></i>
                            <button type="button" class="add-cart-wish">Add To Cart</button>
                            <div class="bottom">
                            <h3 class="product-name wish-product-name">${productTitle}</h3>
                            <div class="prices">
                                <p class="product-price">${productPrice}</p>
                                <span class="old-price"><s>${productOldPrice}</s></span>
                            </div>
                        </div>
                    `;
  
    wishShopBox.innerHTML = wishBoxContent;
    wishItems.append(wishShopBox);
   
    if(addItemToWish)
    {
      countWish();
      countWishTwo();
      countWishThree();
      countWishFour();
    }
    WLSMsg();


    function checkIfDiscount(){
        var checkDiscount = document.getElementsByClassName('disp');
        var percentOff = document.getElementsByClassName('percent-off');
        var checkValue = checkDiscount.length.valueOf(checkDiscount === "");
        // console.log(percentOff);
        if(checkValue){
            console.log(checkValue);
            percentOff.style.display = "none";
            alert('working');
            console.log(percentOff);
        }
    }
    checkIfDiscount();
    



    // Add item to cart from wish list
    addCartButtons = document.getElementsByClassName('add-cart-wish');
    function addCart() {
        for (var i = 0; i < addCartButtons.length; i++) {
            var button = addCartButtons[i];
            button.addEventListener('click', addCartClicked);
        }
    }
    addCart();

    //Remove item from wishlist
    var removeCartButtons = document.getElementsByClassName('del2');
    for (var i = 0; i < removeCartButtons.length; i++){
        var button = removeCartButtons[i];
        button.addEventListener('click', removeCartItem);
    }

    // localStorage.setItem('cartShopBox', JSON.stringify(cartShopBox));
}

  function WLEMsg()
{
  // collecting pop up msg data from html
  const pop = document.querySelector('.Epop-up-msg');
  const clMsg = document.querySelector('.Eclose-message');
  const msgTitle = document.getElementById('Emsg-title');
  const msgDetails = document.getElementById('Emsg-details');
  const poll = document.querySelector('.Epoll');
  const spop = document.querySelector('.pop-up-msg');

  pop.classList.add('active');
  spop.classList.remove('active');

  clMsg.addEventListener('click', ()=>{
  pop.classList.remove('active');
  });

  poll.style.backgroundColor = "red";
  msgTitle.style.color = "red";
  msgTitle.innerHTML = "Error";
  msgDetails.innerHTML = "Item Already in Your Wish List";
  

  setTimeout(()=>{
  //Pop up message
  pop.classList.remove('active');

  }, 5000);
}

function WLSMsg()
{

  // collecting pop up msg data from html
  const pop = document.querySelector('.pop-up-msg');
  const clMsg = document.querySelector('.close-message');
  const msgTitle = document.getElementById('msg-title');
  const msgDetails = document.getElementById('msg-details');
  const poll = document.querySelector('.poll');
  const epop = document.querySelector('.Epop-up-msg');

  pop.classList.add('active');
  epop.classList.remove('active');
  
  clMsg.addEventListener('click', ()=>{
    pop.classList.remove('active');
  });

  poll.style.backgroundColor = "rgb(112, 238, 112)";
  msgTitle.style.color = "rgb(112, 238, 112)";
  msgTitle.innerHTML = "Success";
  msgDetails.innerHTML = "Item Added to Your Wish List";
  

  setTimeout(()=>{
    //Pop up message
    pop.classList.remove('active');

  }, 5000);
}


//Remove item from cart
function removeCartItem(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    // console.log(buttonClicked);
    updateSubTotal();
    updatetotal();
    countCart();
    countCartTwo();
    countCartThree();
    countWish();
    countWishTwo();
    countWishThree();
    countWishFour();
}

function addCartClicked(event){
    var button = event.target;
    var shopProducts = button.parentElement;
    var productTitle = shopProducts.getElementsByClassName('product-name')[0].innerText;
    var productPrice = shopProducts.getElementsByClassName('product-price')[0].innerText;
    var productImg = shopProducts.getElementsByClassName('product-image')[0].src;
    addProductToCart(productTitle, productPrice, productImg);
    updatetotal();
    updateSubTotal();
}

function addProductToCart(productTitle, productPrice, productImg){
    var cartShopBox = document.createElement('div');
    cartShopBox.classList.add('cart-product');
  
    var cartItems = document.getElementsByClassName('cart-content')[0];
    var cartItemsNames = cartItems.getElementsByClassName('cart-product-title');
    var m = document.getElementById('m');
  
    // deny adding to cart if want to add the same product to cart
    for (var i = 0; i < cartItemsNames.length; i++){
        if (cartItemsNames[i].innerText == productTitle){
          eMsg();
          return;
        }
        
    }
  
    var cartBoxContent = `
                      <i class='bx bxs-trash del' ></i>
                      <div class="beg">
                        <div class="img">
                            <img src="${productImg}" alt="product image">
                        </div>
                        <h3 class="cart-product-title">${productTitle}</h3> 
                      </div>
                        <p class="price">${productPrice}</p>
                        <div class="container">
                          <div class="how-many">
                              <input type="number" value="1" name="product-quantity" class="cart-quantity">
                              <div class="button">
                                  <!-- <i class='bx bx-chevron-up top inc' ></i>
                                  <i class='bx bx-chevron-down bottom dec' ></i>  -->
                              </div>
                          </div>
                      </div>
                      <p class="sub-total">${productPrice}</p>
                    `;
  
    cartShopBox.innerHTML = cartBoxContent;
    cartItems.append(cartShopBox);
    cartShopBox.getElementsByClassName('del')[0].addEventListener('click', removeCartItem);
    cartShopBox.getElementsByClassName('cart-quantity')[0].addEventListener('change', quantityChanged);
   
    if(addProductToCart)
    {
      countCartTwo();
      countCart(); 
      countCartThree();
    }
    sMsg();
  
    // localStorage.setItem('cartShopBox', JSON.stringify(cartShopBox));
}

function countCart(){
    var cart = document.getElementsByClassName('cart-product');
    var countItem = document.getElementById('count-items');
    countItem.innerHTML = cart.length;
  
    // Show or hide cart empty message
    var emptyCart = document.querySelector('.empty-cart-msg');
    var cartHeader = document.querySelector('.header-container');
    var buttons = document.querySelector('.return-btn-container');
    var totalCoupon = document.querySelector('.total-coupon-container');
  
    if(cart.length === 0) {
      emptyCart.style.display = 'block';
      cartHeader.style.display = 'none';
      buttons.style.display = 'none';
      totalCoupon.style.display = 'none';
    }
    else {
      emptyCart.style.display = 'none';
      buttons.style.display = 'block';
      cartHeader.style.display = 'block';
      totalCoupon .style.display = 'block';
    }
}
  
  function countCartTwo(){
    var cart = document.getElementsByClassName('cart-product');
    var countItem = document.getElementById('count-items2');
    countItem.innerHTML = cart.length;
    // console.log(cart);
  }
  
  function countCartThree(){
    var cart = document.getElementsByClassName('cart-product');
    var countItem = document.getElementById('count-items3');
    countItem.innerHTML = cart.length;
    //  console.log(countItem);
  }
  
  function eMsg()
  {
    // collecting pop up msg data from html
    const pop = document.querySelector('.Epop-up-msg');
    const clMsg = document.querySelector('.Eclose-message');
    const msgTitle = document.getElementById('Emsg-title');
    const msgDetails = document.getElementById('Emsg-details');
    const poll = document.querySelector('.Epoll');
    const spop = document.querySelector('.pop-up-msg');
  
    pop.classList.add('active');
    spop.classList.remove('active');
  
    clMsg.addEventListener('click', ()=>{
    pop.classList.remove('active');
    });
  
    poll.style.backgroundColor = "red";
    msgTitle.style.color = "red";
    msgTitle.innerHTML = "Error";
    msgDetails.innerHTML = "Item Already in Your cart";
    
  
    setTimeout(()=>{
    //Pop up message
    pop.classList.remove('active');
  
    }, 5000);
  }
  
  function sMsg()
  {
  
    // collecting pop up msg data from html
    const pop = document.querySelector('.pop-up-msg');
    const clMsg = document.querySelector('.close-message');
    const msgTitle = document.getElementById('msg-title');
    const msgDetails = document.getElementById('msg-details');
    const poll = document.querySelector('.poll');
    const epop = document.querySelector('.Epop-up-msg');
  
    pop.classList.add('active');
    epop.classList.remove('active');
    
    clMsg.addEventListener('click', ()=>{
      pop.classList.remove('active');
    });
  
    poll.style.backgroundColor = "rgb(112, 238, 112)";
    msgTitle.style.color = "rgb(112, 238, 112)";
    msgTitle.innerHTML = "Success";
    msgDetails.innerHTML = "Item Added to Your Cart";
    
  
    setTimeout(()=>{
      //Pop up message
      pop.classList.remove('active');
  
    }, 5000);
  }
  

function moveItemToCart(){
    // addCartClicked();
    alert('Work in Progress');
}