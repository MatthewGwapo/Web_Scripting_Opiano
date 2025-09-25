// Registration form validation
const regForm = document.getElementById("registrationForm");
if (regForm) {
  regForm.addEventListener("submit", function(event) {
    let password = document.getElementById("password").value;
    let confirm = document.getElementById("confirm_password").value;
    if (password !== confirm) {
      alert("Passwords do not match!");
      event.preventDefault(); // stop form from submitting
    }
  });
}

// Login form validation
const loginForm = document.getElementById("loginForm");
if (loginForm) {
  loginForm.addEventListener("submit", function(event) {
    let user = document.getElementById("username").value.trim();
    let pass = document.getElementById("password").value.trim();
    if (user === "" || pass === "") {
      alert("Both fields are required!");
      event.preventDefault();
    }
  });
}
