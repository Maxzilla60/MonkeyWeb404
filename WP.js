3/**
 * Created by 11500683 on 17/05/2017.
 */
var container = document.getElementById("eventDiv");
var getID = document.getElementById("getID").value;
var delID = document.getElementById("delID").value;

var url = "http://192.168.217.134/~user/monkey/api/events/";

function myFunction(){

    fetch('url + getID', {
        method: 'GET'
    }).then(function(response) {
        test();
        renderHTML(response);
    }).catch(function(err) {
        // Error :(
    });
};

deleteBtn.addEventListener("click",function(){
    function clicked() {
        if (confirm('Do you want to delete evenement ' + delID + '?')) {
            fetch('url + delID', {
                method: 'DELETE'
            }).then(function(response) {
                // ?
            }).catch(function(err) {
                // Error :(
            });
        }
    }
});

function test() {
    document.getElementById("eventDiv").innerHTML = "red";
}

function renderHTML(data){
    var htmlString = "";
    alert("test");


    //for(i = 0; i<data.length; i++){

        //htmlString += "<p> Event ID: "  + data[i].EventID + "</p>";
       // htmlString += "<p> User Creator ID: "  + data[i].UserCreatorID + "</p>";
       // htmlString += "<p> Event name: "  + data[i].EventName + "</p>";
       // htmlString += "<p> Location: "  + data[i].Location + "</p>";
       // htmlString += "<p> Date: "  + data[i].DateOfEvent + "</p>";
       // htmlString += "<br>";
        //
    //}

    //container.insertAdjacentHTML(htmlString);
}
