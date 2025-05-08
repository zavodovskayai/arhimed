document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const login = document.getElementById('login').value.trim();
    const password = document.getElementById('password').value.trim();

    fetch('/php/fakeLogin.php', {
        method: 'POST',
        body: JSON.stringify({ login, password }),
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(res => {
        if (res.ok) {
            sessionStorage.setItem('auth_ok', '1');
            window.location.href = "/adminAddForm.html";
        } else {
            alert("Неверный логин или пароль.");
        }
    }).catch(() => {
        alert("Ошибка подключения к серверу.");
    });
});