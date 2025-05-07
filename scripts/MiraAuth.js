// Получение элементов формы и сообщения об ошибке
const authForm = document.getElementById('authForm');
const errorMessage = document.getElementById('errorMessage');

// Данные для авторизации
const correctUsername = 'MiraTheBest8800555535';
const correctPassword = 'oladushki';

// Обработчик события отправки формы
authForm.addEventListener('submit', (e) => {
    e.preventDefault(); // Отмена стандартного поведения формы

    // Получение введённых данных
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Проверка логина и пароля
    if (username === correctUsername && password === correctPassword) {
        // Успешная авторизация
        window.location.href = 'dashboard.html'; // Перенаправление на личный кабинет
    } else {
        // Логика ошибок
        if (username !== correctUsername && password !== correctPassword) {
            // Оба значения неверные
            errorMessage.textContent = 'За тобой уже выехали...';
        } else if (username !== correctUsername) {
            // Неверный логин
            errorMessage.textContent = 'Мира, это не твой логин';
        } else if (password !== correctPassword) {
            // Неверный пароль
            errorMessage.textContent = 'Это не твой пароль!!!';
        }

        // Показать сообщение об ошибке
        errorMessage.style.display = 'block';
    }
});
