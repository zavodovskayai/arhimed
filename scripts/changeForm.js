// Переключение между формами
const emailFormBtn = document.getElementById('emailFormBtn');
const callFormBtn = document.getElementById('callFormBtn');
const emailForm = document.getElementById('emailForm');
const callForm = document.getElementById('callForm');

emailFormBtn.addEventListener('click', () => {
    emailForm.classList.add('active');
    callForm.classList.remove('active');
    emailFormBtn.classList.add('active');
    callFormBtn.classList.remove('active');
});

callFormBtn.addEventListener('click', () => {
    callForm.classList.add('active');
    emailForm.classList.remove('active');
    callFormBtn.classList.add('active');
    emailFormBtn.classList.remove('active');
});
