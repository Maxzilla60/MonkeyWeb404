function getAllEvents() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    xhr.open("GET", "api/events/", false);
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

    xhr.open("GET", "api/events/"+id, false);
    xhr.send();

    console.log(xhr.status);
    console.log(xhr.statusText);
}

function getEventsBetweenDates(date1, date2) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    xhr.open("GET", "api/events/?from="+date1+"&until="+date2, false);
    xhr.send();

    console.log(xhr.status);
    console.log(xhr.statusText);
}

/*function getByPersonAndBetweenDates(person, date1, date2) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    xhr.open("GET", "/person/"+person+"/events/?from="+date1+"&until="+date2, false);
    xhr.send();

    console.log("Date1: "+date1);

    console.log(xhr.status);
    console.log(xhr.statusText);
}*/