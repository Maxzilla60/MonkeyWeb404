function getAllEvents() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    xhr.open("GET", "api/events/", false);
    xhr.send();

    /*console.log(xhr.status);
    console.log(xhr.statusText);*/
}

function getEventsByID(id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    xhr.open("GET", "api/events/"+id, false);
    xhr.send();

    /*console.log(xhr.status);
    console.log(xhr.statusText);*/
}

function getEventsByPerson(id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    xhr.open("GET", "api/events/person/"+id, false);
    xhr.send();

    /*console.log(xhr.status);
    console.log(xhr.statusText);*/
}

function getEventsBetweenDates(date1, date2) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    xhr.open("GET", "api/events/byDate/?from="+date1+"&until="+date2, false);
    xhr.send();

    /*console.log(xhr.status);
    console.log(xhr.statusText);*/
}

function getByPersonAndBetweenDates(person, date1, date2) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };

    xhr.open("GET", "api/events/person/"+person+"/byDate/?from="+date1+"&until="+date2, false);
    xhr.send();

    /*console.log(xhr.status);
    console.log(xhr.statusText);*/
}

function postEvent(name, person, date1, date2) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 406) {
            alert("Not all data is set");
        }
        else if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
            alert(name + " toegevoegd!");
        }
    }

    xhr.open("POST", "api/events/", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.send(JSON.stringify({name: name, personid: person, startdate: date1, enddate: date2}));

    //document.getElementById("output").innerHTML = JSON.stringify({name: name, personid: person, startdate: date1, enddate: date2}, null, "\t");
}