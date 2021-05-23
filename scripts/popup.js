const popupBtn = document.querySelector('.navBtn');
const closePopupBtn = document.querySelector('.popup__close')
const popup = document.querySelector('.popup')

const showPopup = () => {
    popup.classList.toggle('popup--show');
};

popupBtn.addEventListener('click', showPopup);
closePopupBtn.addEventListener('click', showPopup);