document.getElementById('productForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    const response = await fetch('/php/add_product.php', {
        method: 'POST',
        body: formData
    });

    if (response.ok) {
        alert("Товар добавлен!");
        this.reset();
    } else {
        const error = await response.text();
        alert("Ошибка: " + error);
    }
});