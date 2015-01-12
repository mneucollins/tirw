var location010 = new Array(
"Paris","Rome","Toulouse","Copenhagen","Saragossa","Brussels"
);
var location011 = location01();
var location01x = location010[location011];

function location01() {
          return Math.floor( Math.random() * location010.length );	
}  	

var location020 = new Array(
"Vien","Rome","Madrid","Brittany","London","Tahiti"
);
var location021 = location02();
var location02x = location020[location021];

function location02() {
          return Math.floor( Math.random() * location020.length );	
} 
var location030 = new Array(
"Paris","Giverny","Antwerp","Tahiti","Arles","London","an asylum at St R&eacute;my"
);
var location031 = location03();
var location03x = location030[location031];

        function location03() {
          return Math.floor( Math.random() * location030.length );	
}

var location040 = new Array(
"Paris","San Francisco","London","Nice","Tahiti","an asylum at St R&eacute;my","Brussels","New York"
);
var location041 = location04();
var location04x = location040[location041];

function location04() {return Math.floor( Math.random() * location040.length );	
}			

var lands0 = new Array(
"Spain",
"England",
"France"
);
var lands1 = lands();
var landsx = lands0[lands1];
function lands() {return Math.floor( Math.random() * lands0.length );	
}
var lands20 = new Array(
"Spain",
"England",
"France"
);
var lands21 = lands2();
var lands2x = lands20[lands21];
function lands2() {return Math.floor( Math.random() * lands20.length );	
}
var countryIsh0 = new Array(
"Spanish",
"French",
"English"
);
var countryIsh1 = countryIsh();
var countryIshx = countryIsh0[countryIsh1];
function countryIsh() {return Math.floor( Math.random() * countryIsh0.length );	
}
var countryIsh20 = new Array(
"Spanish",
"French",
"English"
);
var countryIsh21 = countryIsh2();
var countryIsh2x = countryIsh20[countryIsh21];
function countryIsh2() {return Math.floor( Math.random() * countryIsh20.length );	
}
var countryX0 = new Array(
"Spanish",
"French",
"English",
"Flemish",
"Flemish",
"Flemish"
);
var countryX1 = countryX();
var countryXx = countryX0[countryX1];
function countryX() {return Math.floor( Math.random() * countryX0.length );	
}