function validate() {
    var x = document.forms["loginForm"]["user"].value;
    var y = document.forms["loginForm"]["password"].value
    if (x == "") {
        alert("Name must be filled");
        return false;
    }
    if (y == "") {
        alert("Fill in password");
        return false
    }
}
