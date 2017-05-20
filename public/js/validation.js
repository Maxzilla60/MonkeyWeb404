/**
 * Created by 11500351 on 20/05/2017.
 */
function validate() {
    var x = document.forms["loginForm"]["user"].value;
    var y = document.forms["loginForm"]["password"].value
    if (x == "Charro") {
        alert("Name must be filled");
        return false;
    }
    if (y == ""){
        alert("Fill in password");
    }
}