function getAllEvents() {
    var xhr = new XMLHttpRequest();

    // Set output field with responsetext when GET is done:
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    // Open and send GET request:
    xhr.open("GET", "api/events/", false);
    xhr.send();
}

function getEventsByID(id) {
    var xhr = new XMLHttpRequest();

    // Set output field with responsetext when GET is done:
    xhr.onreadystatechange = function() {
        // Catch error:
        if (this.readyState == 4 && this.status == 406) {
            alert("ID is not set");
        }
        else if (this.readyState === 4 && this.status === 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    // Open and send GET request:
    xhr.open("GET", "api/events/"+id, false);
    xhr.send();
}

function getEventsByPerson(id) {
    var xhr = new XMLHttpRequest();

    // Set output field with responsetext when GET is done:
    xhr.onreadystatechange = function() {
        // Catch error:
        if (this.readyState == 4 && this.status == 406) {
            alert("ID is not set");
        }
        else if (this.readyState === 4 && this.status === 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    // Open and send GET request:
    xhr.open("GET", "api/events/person/"+id, false);
    xhr.send();
}

function getEventsBetweenDates(date1, date2) {
    var xhr = new XMLHttpRequest();

    // Set output field with responsetext when GET is done:
    xhr.onreadystatechange = function() {
        // Catch error:
        if (this.readyState == 4 && this.status == 406) {
            alert("Not all dates are set");
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    // Open and send GET request:
    xhr.open("GET", "api/events/byDate/?from="+date1+"&until="+date2, false);
    xhr.send();
}

function getByPersonAndBetweenDates(person, date1, date2) {
    var xhr = new XMLHttpRequest();

    // Set output field with responsetext when GET is done:
    xhr.onreadystatechange = function() {
        // Catch error:
        if (this.readyState == 4 && this.status == 406) {
            alert("Not all data is set");
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    // Open and send GET request:
    xhr.open("GET", "api/events/person/"+person+"/byDate/?from="+date1+"&until="+date2, false);
    xhr.send();
}

function postEvent(name, person, date1, date2) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        // Catch error:
        if (this.readyState == 4 && this.status == 406) {
            alert("Not all data is set");
        }
        else if (this.readyState == 4 && this.status == 200) {
            alert(name + " toegevoegd!");
        }
    }

    xhr.open("POST", "api/events/", true); // Open POST request
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8"); // Set request body
    xhr.send(JSON.stringify({name: name, personid: person, startdate: date1, enddate: date2})); // Send POST request
}

function deleteEvent(id) {
    var xhr = new XMLHttpRequest();

    // Set output field with responsetext when GET is done:
    xhr.onreadystatechange = function() {
        // Catch error:
        if ((this.readyState == 4 && this.status == 406) || id == "") {
            alert("ID not found");
        }
        else if (this.readyState === 4 && this.status === 200) {
            alert("Event "+id+" verwijderd!");
        }
    };

    // Open and send GET request:
    xhr.open("GET", "api/events/delete/"+id, false);
    xhr.send();
}

function editEvent(id, name, person, date1, date2) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        // Catch error:
        if ((this.readyState == 4 && this.status == 406) || id == "") {
            alert("ID not found");
        }
        else if (this.readyState == 4 && this.status == 200) {
            alert(name + " aangepast!");
        }
    }

    xhr.open("POST", "api/events/edit/"+id, true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8"); // Set request body
    xhr.send(JSON.stringify({id: id, name: name, personid: person, startdate: date1, enddate: date2})); // Send POST request
}