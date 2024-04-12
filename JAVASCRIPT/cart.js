// // add cart
var cart1 = document.querySelector('.cart');
var cartIcon = document.querySelector('#cart-icon');
var wishPage = document.querySelector('.wish-list');

cartIcon.addEventListener('click', ()=>
{
    // console.log("i am working");
    cart1.classList.toggle('active');
});

var cartIcon2 = document.querySelector('#cart-icon2');
cartIcon2.addEventListener('click', ()=>
{
    // console.log("i am working");
    cart1.classList.toggle('active');
    wishPage.classList.remove('active');
});

var cartIcon3 = document.querySelector('#cart-icon3');
cartIcon3.addEventListener('click', ()=>
{
    cart1.classList.toggle('active');
    wishPage.classList.remove('active');

});
// remove cart
function removeCart()
{
    cart1.classList.toggle('active');
};



//cart Working js
if (document.readyState == 'loading'){
  document.addEventListener("DOMContentLoaded", ready);
} else{
  ready();
}

function ready(){

  //Remove item from cart
  var removeCartButtons = document.getElementsByClassName('del');
  for (var i = 0; i < removeCartButtons.length; i++){
    var button = removeCartButtons[i];
    button.addEventListener('click', removeCartItem);
  }

  //Quantity Changes
  var quantityInputs = document.getElementsByClassName('cart-quantity');
  for (var i = 0; i < quantityInputs.length; i++){
    var input = quantityInputs[i];
    input.addEventListener('change', quantityChanged);
    alert(input);
  }

  //Add cart 
  var addCart = document.getElementsByClassName('add-cart');
  for(var i = 0; i < addCart.length; i++){
      var button = addCart[i];
      button.addEventListener('click', addCartClicked);
  }
  countCart();
  countCartTwo();
  countCartThree();
}

//Quantity Changes
function quantityChanged(event){
  var input = event.target
  if (isNaN(input.value) || input.value <= 0){
      input.value = 1;
  }
  updatetotal();
  updateSubTotal();
}

//Remove item from cart
function removeCartItem(event){
  var buttonClicked = event.target;
  buttonClicked.parentElement.remove();
  // console.log(buttonClicked);
  updatetotal();
  updateSubTotal();
  countCart();
  countCartTwo();
  countCartThree();
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
}

function countCartThree(){
  var cart = document.getElementsByClassName('cart-product');
  var countItem = document.getElementById('count-items3');
  countItem.innerHTML = cart.length;
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

// const initApp = () => {
//   if(localStorage.getItem('cartShopBox')){
//     cartShopBox = JSON.parse(localStorage.getItem('cartShopBox'))
//   }
//   addProductToCart();
// }


function updatetotal() {
  var cartContent = document.getElementsByClassName('cart-content')[0];
  var cartBoxes = cartContent.getElementsByClassName('cart-product');
  var total = 0;
  var subTotal = 0;
  var shipFee = 0;
  var shippingFeeElement = document.getElementsByClassName('shipping-fee')[0];
  var shippingFee = parseFloat(shippingFeeElement.innerText.replace("$", ""));
  var mainTotalElement = document.getElementsByClassName('main-total')[0];
  var mainTotal = parseFloat(mainTotalElement.innerText.replace("$", ""));
  
  for (var i = 0; i < cartBoxes.length; i++) {
      var cartBox = cartBoxes[i];
      var priceElement = cartBox.getElementsByClassName('price')[0];
      var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
      var price = parseFloat(priceElement.innerText.replace("$", ""));
      var quantity = quantityElement.value;
      total += price * quantity;
  }

  // If price contains some cents value
  total = Math.round(total * 100) / 100;

  mainTotal = shippingFee + total;
  shipFee = shippingFee;

  // Update the elements
  document.getElementsByClassName('total-sum1-price')[0].innerText = '$' + total.toFixed(2);
  document.getElementsByClassName('main-total')[0].innerText = '$' + mainTotal.toFixed(2);
  document.getElementsByClassName('shipFee')[0].innerText = '$' + shipFee.toFixed(2);
}

function updateSubTotal() {
  var cartContent = document.getElementsByClassName('cart-content')[0];
  var cartBoxes = cartContent.getElementsByClassName('cart-product');

  for (var i = 0; i < cartBoxes.length; i++) {
      var cartBox = cartBoxes[i];
      var priceElement = cartBox.getElementsByClassName('price')[0];
      var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
      var subTotalElement = cartBox.getElementsByClassName('sub-total')[0];

      var price = parseFloat(priceElement.innerText.replace("$", ""));
      var quantity = quantityElement.value;

      // Calculate subtotal for each item
      var subTotal = price * quantity;
      subTotalElement.innerText = '$' + subTotal.toFixed(2);
  }

  updatetotal();
}

function updateCart(){
  updateSubTotal();
  updatetotal();
}

