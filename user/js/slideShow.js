const banner = document.querySelector('.banner-item');
const bannerImg = document.querySelectorAll('.banner-img');
const owls = document.querySelectorAll('.owl');

let index = 0;

var manualNav = (manual) => {
    owls.forEach(owl => {
        owl.classList.remove('active');
    })

    owls[manual].classList.add('active');

}

var repeat = function () {

    let i = 0;

    var repeater = () => {
        setTimeout(function () {

            owls.forEach(owl => {
                owl.classList.remove('active');
            })

            owls[i].classList.add('active');
            banner.style.transform = `translate3d(${i * -100}%, 0, 0)`;

            i++;

            if (i > 3) {
                i = 0;
            }

            repeater();

        }, 2000)

    }

    repeater();
}

repeat();


// var repeat = setInterval(() => {


// }, 2000);
owls.forEach((owl, i) => {

    owl.addEventListener('click', () => {
        index = i;
        manualNav(i);

        banner.style.transform = `translate3d(${index * -100}%, 0, 0)`;

    })
})
banner.style.transform = `translate3d(${index * -100}%, 0, 0)`;


index++;

if (index > 3) {
    index = 0;
}