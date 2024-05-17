function sign_in() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    
    // Contoh validasi sederhana
    if (username === "admin" && password === "password") {
        alert("Login berhasil!");
        window.location.href = "index.html"
    } else {
        alert("Email atau password salah.");
    }
}