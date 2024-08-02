


function loginMethod(event) {
    event.preventDefault();

    const username = document.getElementById("username1").value;
    const password = document.getElementById("password").value;

    // Replace with actual authentication logic
    if (username === "test" && password === "test") {
        window.location.href = "dashboard.html";
    } else {
        alert("Invalid credentials");
    }
}

function createAccount() {
    // Add logic for account creation or redirect to account creation page
    alert("Redirect to account creation page or handle account creation");
}

function navigateTo(page) {
    window.location.href = page;
}
