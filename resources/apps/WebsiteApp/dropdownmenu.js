
const activateDropDown = () => {

    document.querySelectorAll('.header__navbar-dropmenu').forEach(menu => {

        let dropmenuContent = menu.querySelector('.header__navbar-dropmenu-content');

        menu.addEventListener('mouseenter', () => {
            dropmenuContent.style.visibility = 'visible';
            dropmenuContent.style.opacity = '1';
        });

        menu.addEventListener('mouseleave', () => {
            dropmenuContent.style.visibility = 'hidden';
            dropmenuContent.style.opacity = '0';
        });

    })
}

export default activateDropDown;