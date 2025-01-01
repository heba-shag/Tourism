let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let regisBtn = document.querySelector('#register-btn');
let regisForm = document.querySelector('.register-container');
let formClose = document.querySelector('#form-close');
let regisClose = document.querySelector('#form-close1');

let regisBack = document.querySelector('#back');
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
// let videoBtn = document.querySelectorAll('.vid-btn');
var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});


let loginbtn1 = document.querySelector('#login-btn1');

const loginBtn = document.getElementById('loginBtn');
  
const modalOverlay = document.querySelector('.modalOverlay');
const modalPop = document.querySelector('.modalPop');


// loginBtn.addEventListener('click', () => {

//   modalOverlay.style.display = 'block';
//   modalPop.style.display = 'block';
// });


modalOverlay.addEventListener('click', () => {

  modalOverlay.style.display = 'none';
  modalPop.style.display = 'none';
});

// console.log(screen.availWidth);
//remove form when scroll
window.onscroll = () => {
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
    regisForm.classList.remove('active');
    // dropDis.classList.remove('active');
    // dropSer.classList.remove('active');
}

//click on menu icon to open it
menu.addEventListener('click', () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

// diseases.addEventListener('click', () => {
//     dropDis.classList.toggle('active');
//     dropSer.classList.remove('active');

// })

// service.addEventListener('click', () => {
//     dropSer.classList.toggle('active');
//     dropDis.classList.remove('active');
// })

//when click search icon open search form
searchBtn.addEventListener('click', () => {
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
});

//when click login icon open login form
formBtn.addEventListener('click', () => {
    loginForm.classList.add('active');
});




//when click close icon remove login form
formClose.addEventListener('click', () => {
    loginForm.classList.remove('active');
});

regisBtn.addEventListener('click', () => {
    loginForm.classList.remove('active');
    regisForm.classList.add('active');
});

regisClose.addEventListener('click', () => {
    regisForm.classList.remove('active');
});
// loginbtn1.addEventListener('click', () => {
//     loginForm.classList.add('active');
// });
regisBack.addEventListener('click', () => {
    regisForm.classList.remove('active');
    loginForm.classList.add('active');
})


//header slider
// videoBtn.forEach(btn => {
//     btn.addEventListener('click', () => {
//         document.querySelector('.controls .active').classList.remove('active');
//         btn.classList.add('active');
//         let src = btn.getAttribute('data-src');
//         document.querySelector('#video-slider').src = src;
//     });
// });

//reviews slider



var swiper = new Swiper(".brand-slider", {
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        450: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        991: {
            slidesPerView: 4,
        },
        1200: {
            slidesPerView: 5,
        },
    },
});