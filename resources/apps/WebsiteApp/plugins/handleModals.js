const bodyElement = document.body;

const openBtns = document.querySelectorAll('[data-modal-btn-open]');
const dismissBtns = document.querySelectorAll('[data-modal-btn-dismiss]');

openBtns.forEach((btn) => {
    btn.addEventListener('click', launchModal)
})

dismissBtns.forEach((btn) => {
    btn.addEventListener('click', dismissModal)
})




function launchModal(e) {

    const modal = document.querySelector(`[data-modal="${e.target.dataset.modalTarget}"]`)

    if (modal) {
        modal.classList.add('active');
        bodyElement.classList.add('modal-open');
    }
}

function dismissModal() {

    const activeModals = document.querySelectorAll('[data-modal].active');

    if (activeModals.length > 0) {
        activeModals.forEach((modal) => {
            modal.classList.remove('active');
        })
    }

    bodyElement.classList.remove('modal-open');
}


bodyElement.addEventListener('click', function (e) {
    if (e.target === bodyElement) {
        dismissModal();
    }

});