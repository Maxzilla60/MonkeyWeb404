function getId(id){
    var url = "http://192.168.217.134/~user/monkey/api/events/";
   fetch(url + id, {
       method: 'GET'
   }).then(function (response) {
       return response.json();
   }).then (function (j) {
       printEvent(j[0]);
   });
}
function printEvent(event) {
    var div = document.getElementById("eventDiv");
    div.innerHTML = "Event id: " + event.id;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + "Person id: " + event.personid;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + "Startdate: " + event.startdate;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + "Enddate: " + event.enddate;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + "Eventname: " + event.name;
}

    function deleteID(id) {
        var url = "http://192.168.217.134/~user/monkey/api/events/";
        if (confirm('Do you want to delete evenement ' + id + '?')) {
            fetch(url + id, {
                method: 'DELETE'
            }).then(function (response) {
                window.location.reload()
            })
        }
    }




