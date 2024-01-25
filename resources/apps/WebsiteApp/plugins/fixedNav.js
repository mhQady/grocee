window.addEventListener('scroll', function () {
    var navbar = document.querySelector('.header');
    var content = document.querySelector('main');

    if (window.scrollY > navbar.offsetTop) {
        navbar.classList.add('navbar-fixed');
        content.style.marginTop = navbar.offsetHeight + 'px';
    } else {
        navbar.classList.remove('navbar-fixed');
        content.style.marginTop = '0';
    }
});