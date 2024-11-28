//word at home page 
var typed = new Typed(".text", {
    strings:["Digital Artist" , "Student" , "Caregiver"],
    typeSpeed:100,
    backSpeed:100,
    backDelay:1000,
    loop:true
});

//hamburger menu icon 
let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');
let sections = document.querySelector('section');
let navLinks = document.querySelector('header nav a');

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let hieght = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if (top >= offset && top < offset + height){
            navLinks.forEach(links =>{
                links.classList.remove('active');
                document.querySelector('header nav a [href*=' + id + ']').classList.add ('active')
            })
        }
    })
}
menuIcon.onclick = () => {
    menuIcon.classList.toggle ('bx-x');
    navbar.classList.toggle('active');
    }


//mouse movement or the cursor
var cursor = document.querySelector(".cursor");
var cursor2 = document.querySelector(".cursor2");
document.addEventListener("mousemove",function(e){
    cursor.style.cssText = cursor2.style.cssText ="left: " + e.clientX
    + "px; top: " + e.clientY + "px;";
});

//Testimonial Stars
const allStar = document.querySelectorAll('.ratings .star')
const ratingsValue =document.querySelector('.ratings input')

allStar .forEach((item, idx)=> {
    item.addEventListener('click', function () {
        let click= 0
        ratingsValue.value = idx +1
        console.log(ratingsValue.value)
        allStar.forEach (i=> {
            i.classList.replace('bxs-star', 'bx-star')
            i.classList.add('active')
        })
        for(let i=0; i<allStar.length; i++) {
            if (i <= idx) {
                allStar[i].classList.replace('bx-star', 'bxs-star')
                allStar[i].classList.add('active')
            } else{
                allStar[i].style.setProperty('--1', click)
                click++
            }
        }
    })
})