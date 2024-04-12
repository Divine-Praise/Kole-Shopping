//onscroll
// document.addEventListener('scroll', () =>{
//     const nav = document.querySelector('nav');
    
//     if (window.scrollY > 0){
//         nav.classList.add('scrolled');
//     }else{
//         nav.classList.remove('scrolled');
//     }
// });

//Side bar dropdown
const mainDp1 = document.querySelector('.main_dropdown_one');
const mainDp2 = document.querySelector('.main_dropdown_two');
const dp1 = document.querySelector('.sidebar_dropdown_one');
const dp2 = document.querySelector('.sidebar_dropdown_two');
const dpIcon1 = document.querySelector('.dp_icon1');
const dpIcon2 = document.querySelector('.dp_icon2');
const titleOne = document.querySelector('.title1');
const titleTwo = document.querySelector('.title2');

// function
titleOne.addEventListener('click', ()=>
{
    // console.log("i am working");
    dpIcon1.classList.toggle('active');
    dp1.classList.toggle('active');
    dp2.classList.remove('active');
    dpIcon2.classList.remove('active');

});

titleTwo.addEventListener('click', ()=>
{
    // console.log("i am working");
    dpIcon2.classList.toggle('active');
    dp2.classList.toggle('active');
    dp1.classList.remove('active');
    dpIcon1.classList.remove('active');
});

// Flash sales count down
var countDownDate = new Date("mar 20, 2024 00:00:00").getTime()
var x = setInterval(function()
{

    var now = new Date().getTime();
    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 *24));
    var hours = Math.floor((distance % (1000 * 60 * 60 *24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

    if(distance < 0){
        clearInterval(x);
        document.getElementById("days").innerHTML = "00";
        document.getElementById("hours").innerHTML = "00";
        document.getElementById("minutes").innerHTML = "00";
        document.getElementById("seconds").innerHTML = "00";
    }

},1000);

// News Category count down
var countDownDate2 = new Date("mar 10, 2024 00:00:00").getTime()
var catX = setInterval(function()
{

    var catNow = new Date().getTime();
    var catDistance = countDownDate2 - catNow;

    var catDays = Math.floor(catDistance / (1000 * 60 * 60 *24));
    var catHours = Math.floor((catDistance % (1000 * 60 * 60 *24)) / (1000 * 60 * 60));
    var catMinutes = Math.floor((catDistance % (1000 * 60 * 60)) / (1000 * 60));
    var catSeconds = Math.floor((catDistance % (1000 * 60)) / 1000);

    document.getElementById("days2").innerHTML = catDays;
    document.getElementById("hr2").innerHTML = catHours;
    document.getElementById("min2").innerHTML = catMinutes;
    document.getElementById("sec2").innerHTML = catSeconds;

    if(catDistance < 0){
        clearInterval(catX);
        document.getElementById("days2").innerHTML = "00";
        document.getElementById("hr2").innerHTML = "00";
        document.getElementById("min2").innerHTML = "00";
        document.getElementById("sec2").innerHTML = "00";
    }

},1000);    

// update footer year
var date1 = new Date()
document.querySelector("#get-year").innerText = date1.getFullYear();

// update footer year
var date2 = new Date()
document.querySelector("#get-year2").innerText = date2.getFullYear();

// update footer year
var date3 = new Date()
document.querySelector("#get-year3").innerText = date3.getFullYear();



// scroll to the top
function scrolltop(){
  window.scrollTo(0, 0);
};

