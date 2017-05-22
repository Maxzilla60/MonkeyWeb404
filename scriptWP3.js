
var url = "http://192.168.217.134/~user/monkey/api/events/";

document.getElementById("searchButton").addEventListener("click",getId);
document.getElementById("deleteButton").addEventListener("click",deleteID);

function getId(){
    var getID = document.getElementById("getID").value;
   fetch(url + getID)
       .then(function (response) {
           return response.json();
       })
       .then(function (j) {
           console.log(j)
           j.forEach(printEvent)
       });
}
function printEvent(event){
    var div = document.getElementById("eventDiv");
    div.innerHTML = event.id;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + event.personid;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + event.startdate;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + event.enddate;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + event.name;
}

    function deleteID() {
        var delID = document.getElementById("delID").value;
        if (confirm('Do you want to delete evenement ' + delID + '?')) {
            fetch(url + delID + "/", {
                method: 'DELETE',
            }).then(
                window.location.reload()
            );
        }
    }




