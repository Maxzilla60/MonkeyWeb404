function getAllEvents() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    xhr.open("GET", "getallevents.php", false);
    xhr.send();

    console.log(xhr.status);
    console.log(xhr.statusText);
}

function getEventsByID(id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    xhr.open("GET", "geteventbyid.php?q="+id, false);
    xhr.send();

    console.log(xhr.status);
    console.log(xhr.statusText);
}