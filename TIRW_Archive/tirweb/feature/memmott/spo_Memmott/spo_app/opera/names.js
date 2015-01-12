
        var fname0 = new Array( "Jacques-Louis","Eugene","Francisco","Jean-Auguste","Edgar","Edouard","Vincent","Paul","Pierre-August","Paul","Henri","Claude");
        var fname1 = fName();
        var fnamex = fname0[fname1];
        function fName() {
          return Math.floor( Math.random() * fname0.length );
        }
var fnameB0 = new Array( "Jacques-Louis","Eugene","Francisco","Jean-Auguste","Edgar","Edouard","Vincent","Paul","Pierre-August","Paul","Henri","Claude","John","William","Camille");
        var fnameB1 = fnameB();
        var fnameBx = fnameB0[fnameB1];
        function fnameB() {
          return Math.floor( Math.random() * fnameB0.length );
        }		
        var lname0 = new Array(" David"," Delacroix"," Goya"," Ingres"," Degas","  Manet"," Van Gogh"," Cezanne"," Renoir"," Gauguin"," Matisse"," Monet");
        var lname1 = lName();
        var lnamex = lname0[lname1];
        function lName() {
          return Math.floor( Math.random() * lname0.length );
        }
var lnameB0 = new Array(" David"," Delacroix"," Goya"," Ingres"," Degas","  Manet"," Van Gogh"," Cezanne"," Renoir"," Gauguin"," Matisse"," Monet"," Pisarro"," Seurat"," Toulouse-Lautrec"," Constable"," Blake");
        var lnameB1 = lnameB();	
        var lnameBx = lnameB0[lnameB1];
        function lnameB() {
          return Math.floor( Math.random() * lnameB0.length );
        }	
var inartist0 = new Array(
"Pisarro","Constable","Blake","Giotto","Bosch","Fragonard","Caravaggio","El Greco","Poussin","Watteau","Rubens","Leonardo","Chinese art of the T'ang period","Pre-Columbian artifacts","Ancient Egyptian papyruses"
);
var inartist1 = inartist();
var inartistx = inartist0[inartist1];

        function inartist() {
          return Math.floor( Math.random() * inartist0.length );	
				}	
var inartist20 = new Array(
"Pisarro whose","Constable whose","Blake whose","Giotto whose","Bosch whose","Fragonard whose","Caravaggio whose","El Greco whose","Poussin whose","Watteau whose","Rubens whose","Leonardo whose","Chinese art of the T'ang period. This","Pre-Columbian artifacts. This","Ancient Egyptian papyruses. This"
);
var inartist21 = inartist2();
var inartist2x = inartist20[inartist21];

        function inartist2() {
          return Math.floor( Math.random() * inartist20.length );	
				}							
		
var miscartist0 = new Array(
"Bob Ross",
"Andy Warhol","Frank Stella","Jackson Pollock",
"Cindy Sherman","Eva Hessa",
"Francesco Clemente","Anselm Kiefer","Mark Rotchko",
"Marcel Duchamp","Rene Magritte",
"Picasso"
);
var miscartist1 = miscartist();
var miscartistx = miscartist0[miscartist1];

        function miscartist() {
          return Math.floor( Math.random() * miscartist0.length );	
				}
var miscartistB0 = new Array(
"Thomas Kincaide",
"Andy Warhol","Jasper Johns","Robert Rauschenberg",
"Barbara Kruger","Jenny Holzer",
"Jeff Koons","Julian Schnabel","David Salle",
"Marcel Duchamp","Marcel Broodthaers",
"Picasso"
);
var miscartistB1 = miscartistB();
var miscartistBx = miscartistB0[miscartistB1];

        function miscartistB() {
          return Math.floor( Math.random() * miscartistB0.length );	
} 	
