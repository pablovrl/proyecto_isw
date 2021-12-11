var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
var yyyy = today.getFullYear();
var th = today.getHours();
var m = today.getMinutes();

if(dd<10){
dd='0'+dd
} 
if(mm<10){
mm='0'+mm
} 
if(th<10){
    th='0'+th
    } 
if(m<10){
m='0'+m
} 

today = yyyy+'-'+mm+'-'+dd;

document.getElementById("desde").max = today;
document.getElementById("hasta").max = today;
