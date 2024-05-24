

document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Зупиняємо стандартну поведінку форми

        const formData = new FormData(loginForm);

        fetch("login_user.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Login successful!");
                    // Перенаправлення на сторінку Home після успішного входу
                    window.location.href = "home.html";
                } else {
                    alert("Login failed. " + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    });
});
