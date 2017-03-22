var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("p").innerHTML = this.responseText;
    }
};

xhr.open("GET", "getevent.php?q=5", false);
xhr.send();

console.log(xhr.status);
console.log(xhr.statusText);