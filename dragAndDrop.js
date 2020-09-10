let firstDiv = document.getElementById('firstDiv');
let secondDiv = document.getElementById('secondDiv');
let dropDiv = document.getElementById('dropDiv');
let form = document.forms.namedItem('form');
let phone = document.getElementById('phone');
let email = document.getElementById('email');
let name = document.getElementById('name');
let phoneError = document.getElementById('phoneError');
let emailError = document.getElementById('emailError');
let nameError = document.getElementById('nameError');


function dragStart( event ) {
    event.dataTransfer.setData("Text", event.target.id);
}
function allowDrop( event ) {
    event.preventDefault();
}
function dragEnter( event ) {
    if (event.target.className === "dragAndDrop" ) {
        event.target.style.border = "2px dotted black";
    }
}
function dragLeave( event ) {
    if (event.target.className === "dragAndDrop" ) {
        event.target.style.background = "";
        event.target.style.border = "";
    }
}
function drop( event ) {
    let data = event.dataTransfer.getData("Text");
    event.target.appendChild( document.getElementById( data ));
}




