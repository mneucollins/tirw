function hide(id,nest){
if(document.layers){
if(nest) document.layers[nest].document.layers[id].visibility="hidden"
else document.layers[id].visibility="hidden"
}
else if(document.all) document.all[id].style.visibility="hidden"
else if(document.getElementById)document.getElementById(id).style.visibility = "hidden";
}

function show(id,nest){
if(document.layers){
if(nest) document.layers[nest].document.layers[id].visibility="visible"
else document.layers[id].visibility="visible"
}
else if(document.all) document.all[id].style.visibility="visible"
else if(document.getElementById)document.getElementById(id).style.visibility = "visible";
}

function showBase() {
var base;
base = 1+Math.round(Math.random()*11); 
if (base==1) show('base01');
if (base==2) show('base02');
if (base==3) show('base03');
if (base==4) show('base04');
if (base==5) show('base05');
if (base==6) show('base06');
if (base==7) show('base07');
if (base==8) show('base08');
if (base==9) show('base09');
if (base==10) show('base10');
if (base==11) show('base11');
if (base==12) show('base12');
}
function showBase2() {
var baseb;
baseb = 1+Math.round(Math.random()*11); 
if (baseb==1) show('base01b');
if (baseb==2) show('base02b');
if (baseb==3) show('base03b');
if (baseb==4) show('base04b');
if (baseb==5) show('base05b');
if (baseb==6) show('base06b');
if (baseb==7) show('base07b');
if (baseb==8) show('base08b');
if (baseb==9) show('base09b');
if (baseb==10) show('base10b');
if (baseb==11) show('base11b');
if (baseb==12) show('base12b');
}
function showEyeOne() {
var eyeone;
eyeone = 1+Math.round(Math.random()*11); 
if (eyeone==1) show('eyeone01');
if (eyeone==2) show('eyeone02');
if (eyeone==3) show('eyeone03');
if (eyeone==4) show('eyeone04');
if (eyeone==5) show('eyeone05');
if (eyeone==6) show('eyeone06');
if (eyeone==7) show('eyeone07');
if (eyeone==8) show('eyeone08');
if (eyeone==9) show('eyeone09');
if (eyeone==10) show('eyeone10');
if (eyeone==11) show('eyeone11');
if (eyeone==12) show('eyeone12');
}
function showEyeTwo() {
var eyetwo;
eyetwo = 1+Math.round(Math.random()*11); 
if (eyetwo==1) show('eyetwo01');
if (eyetwo==2) show('eyetwo02');
if (eyetwo==3) show('eyetwo03');
if (eyetwo==4) show('eyetwo04');
if (eyetwo==5) show('eyetwo05');
if (eyetwo==6) show('eyetwo06');
if (eyetwo==7) show('eyetwo07');
if (eyetwo==8) show('eyetwo08');
if (eyetwo==9) show('eyetwo09');
if (eyetwo==10) show('eyetwo10');
if (eyetwo==11) show('eyetwo11');
if (eyetwo==12) show('eyetwo12');
}
function showNose() {
var nose;
nose = 1+Math.round(Math.random()*11); 
if (nose==1) show('nose01');
if (nose==2) show('nose02');
if (nose==3) show('nose03');
if (nose==4) show('nose04');
if (nose==5) show('nose05');
if (nose==6) show('nose06');
if (nose==7) show('nose07');
if (nose==8) show('nose08');
if (nose==9) show('nose09');
if (nose==10) show('nose10');
if (nose==11) show('nose11');
if (nose==12) show('nose12');
}
function showMouth() {
var mouth;
mouth = 1+Math.round(Math.random()*11); 
if (mouth==1) show('mouth01');
if (mouth==2) show('mouth02');
if (mouth==3) show('mouth03');
if (mouth==4) show('mouth04');
if (mouth==5) show('mouth05');
if (mouth==6) show('mouth06');
if (mouth==7) show('mouth07');
if (mouth==8) show('mouth08');
if (mouth==9) show('mouth09');
if (mouth==10) show('mouth10');
if (mouth==11) show('mouth11');
if (mouth==12) show('mouth12');
}
function showEar() {
var ear;
ear = 1+Math.round(Math.random()*7); 
if (ear==1) show('ear01');
if (ear==2) show('ear02');
if (ear==3) show('ear03');
if (ear==4) show('ear04');
if (ear==5) show('ear05');
if (ear==6) show('ear06');
if (ear==7) show('ear07');
if (ear==8) show('ear08');
}
