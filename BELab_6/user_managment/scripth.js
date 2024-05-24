// script.js

document.addEventListener("DOMContentLoaded", function() {
    fetch("get_users.php")
        .then(response => response.json())
        .then(data => {
            const userList = document.getElementById("userList");
            data.forEach(user => {
                const li = document.createElement("li");
                li.textContent = user.name + " - " + user.email;

                const editButton = document.createElement("button");
                editButton.textContent = "Edit";
                editButton.onclick = function() {
                    // Редагування користувача
                    editUser(user);
                };
                li.appendChild(editButton);

                const deleteButton = document.createElement("button");
                deleteButton.textContent = "Delete";
                deleteButton.onclick = function() {
                    // Видалення користувача
                    deleteUser(user);
                };
                li.appendChild(deleteButton);

                userList.appendChild(li);
            });
        })
        .catch(error => console.error('Error:', error));
});

function editUser(user) {
    const newName = prompt("Enter new name:", user.name);
    if (newName !== null) {
        fetch("edit_user.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                id: user.id,
                name: newName
            })
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                // Оновити список користувачів після редагування
                location.reload();
            })
            .catch(error => console.error('Error:', error));
    }
}

function deleteUser(user) {
    if (confirm("Are you sure you want to delete this user?")) {
        fetch("delete_user.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                id: user.id
            })
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                // Оновити список користувачів після видалення
                location.reload();
            })
            .catch(error => console.error('Error:', error));
    }
}
