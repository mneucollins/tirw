
function outy1()
	{
	var timer=setTimeout("show('star1');hide('controlX-0');show('controlX-1');outy2();show('doc01');show('doc06');show('artifactA');show('artifactB');", 0)
	}	
function outy2()
	{
	var timer=setTimeout("show('star2');hide('star1');outy3();show('doc02');show('doc07');", 500)
	}	
function outy3()
	{
	var timer=setTimeout("show('star3');hide('star2');outy4();show('doc03');", 500)
	}	
	
function outy4()
	{
	var timer=setTimeout("hide('phase');show('star4');outy5();show('doc04');show('doc08');", 250)
	}	
	
function outy5()
	{
	var timer=setTimeout("hide('star3');hide('controlX-1');outy6();show('doc05');", 250)
	}		
function outy6()
	{
	var timer=setTimeout("hide('star4');show('preSlide');show('cone');igNite();", 500)
	}		

function flashOut()
	{
	var timer=setTimeout("hide('controlX-0');show('controlX-1');hide('star4');puncture00()", 100)
	}
function setLex1()
	{
	
	show('LEX01');hide('doc01');
	
	var timer=setTimeout("hide('LEX01');show('doc01off'); ", 15000)
	}	
function setLex2()
	{
	
	show('LEX02');hide('doc02');
	
	var timer=setTimeout("hide('LEX02');show('doc02off'); ", 15000)
	}	
function setLex3()
	{
	
	show('LEX03');hide('doc03');
	
	var timer=setTimeout("hide('LEX03');show('doc03off'); ", 15000)
	}	
function setLex4()
	{
	
	show('LEX04');hide('doc04');
	
	var timer=setTimeout("hide('LEX04');show('doc04off'); ", 15000)
	}	
function setLex5()
	{
	show('LEX05');hide('doc05');
	
	var timer=setTimeout("hide('LEX05');show('doc05off'); ", 15000)
	}	
function setLex6()
	{
	
	show('LEX06');hide('doc06');
	
	var timer=setTimeout("hide('LEX06');show('doc06off'); ", 15000)
	}	
function setLex7()
	{
	
	show('LEX07');hide('doc07');
	
	var timer=setTimeout("hide('LEX07');show('doc07off'); ", 15000)
	}	
function setLex8()
	{
	
	show('LEX08');hide('doc08');
	
	var timer=setTimeout("hide('LEX08');show('doc08off'); ", 15000)
	}		
function setLex9()
	{
	
	show('LEX09');hide('doc09');
	
	var timer=setTimeout("hide('LEX09');show('doc09off'); ", 15000)
	}

function meterHide0(){

hide('DIV-3-1');hide('DIV-3-2');hide('DIV-3-3');hide('DIV-3-4');hide('DIV-3-5');hide('DIV-3-6');hide('DIV-3-7');hide('DIV-3-8');
	}
function meterHide1(){

hide('DIV-3-0');hide('DIV-3-2');hide('DIV-3-3');hide('DIV-3-4');hide('DIV-3-5');hide('DIV-3-6');hide('DIV-3-7');hide('DIV-3-8');
	}
function meterHide2(){

hide('DIV-3-0');hide('DIV-3-1');hide('DIV-3-3');hide('DIV-3-4');hide('DIV-3-5');hide('DIV-3-6');hide('DIV-3-7');hide('DIV-3-8');
	}
function meterHide3(){

hide('DIV-3-0');hide('DIV-3-1');hide('DIV-3-2');hide('DIV-3-4');hide('DIV-3-5');hide('DIV-3-6');hide('DIV-3-7');hide('DIV-3-8');
	}
				
function meterHide4(){

hide('DIV-3-0');hide('DIV-3-1');hide('DIV-3-2');hide('DIV-3-3');hide('DIV-3-5');hide('DIV-3-6');hide('DIV-3-7');hide('DIV-3-8');
	}


function meterHide5(){

hide('DIV-3-0');hide('DIV-3-1');hide('DIV-3-2');hide('DIV-3-3');hide('DIV-3-4');hide('DIV-3-6');hide('DIV-3-7');hide('DIV-3-8');
	}	

function meterHide6(){

hide('DIV-3-0');hide('DIV-3-1');hide('DIV-3-2');hide('DIV-3-3');hide('DIV-3-4');hide('DIV-3-5');hide('DIV-3-7');hide('DIV-3-8');
	}	

function meterHide7(){

hide('DIV-3-0');hide('DIV-3-1');hide('DIV-3-2');hide('DIV-3-3');hide('DIV-3-4');hide('DIV-3-5');hide('DIV-3-6');hide('DIV-3-8');
	}	

function meterHide8(){

hide('DIV-3-0');hide('DIV-3-1');hide('DIV-3-2');hide('DIV-3-3');hide('DIV-3-4');hide('DIV-3-5');hide('DIV-3-6');hide('DIV-3-7');
	}	
	




var count = new Array( 49 );

function countInit( )
{
	for( var i = 0; i < 49 ; i++ )
	{
		count[ i ] = 0
	}
}

function countInitNonZero( )
{
	var divbase = "DIV"
	var div
	var current

	count[ 0 ] = 0
	count[ 1 ] = 0
	for( var i = 0; i < 2 ; i++ )
	{
		current = divbase + "-" + i + "-" + 0
		div = divbase + "-" + i + "-" + count[ i ]
		hide( current )
		show( div )
	}
}



function showChanges( )
{
	var i
	var divbase = "DIV"
	var div
	var digit
	var current

	for( i = 0; i < 2 ; i++ )
	{
		current = divbase + "-" + i + "-" + count[ i ]
		diget = count[ i ]
		if( diget == 49 )
		{
			count[ i ] = 0
			div = divbase + "-" + i + "-" + count[ i ]
			show( div )
			hide( current )
		}
		else
		{
			count[ i ] = count[ i ] + 1
			div = divbase + "-" + i + "-" + count[ i ]
			show( div )
			hide( current )
			break
		}
	}
	var timer=setTimeout("showChanges( )", 20)	
}

function puncture00()
{
	countInitNonZero( )
	showChanges( )
}






function hide(id,nest){
if(document.layers){
if(nest) document.layers[nest].document.layers[id].visibility="hidden"
else document.layers[id].visibility="hidden"
}
else if(document.all) document.all[id].style.visibility="hidden"
}
function show(id,nest){
if(document.layers){
if(nest) document.layers[nest].document.layers[id].visibility="visible"
else document.layers[id].visibility="visible"
}
else if(document.all) document.all[id].style.visibility="visible"
}	


        var n = (document.layers) ? 1:0;
        var ie = (document.all) ? 1:0;
from=0

vac=true 

speedTr=10
  
prt_step=20


function makeArea(bot,org){
    org=(!org) ? '':'document.'+org+'.'
    this.css=(n) ? eval(org+'document.'+bot):eval(bot+'.style')
        this.scrollHeight=n?this.css.document.height:eval(bot+'.offsetHeight')
        this.up=measure
    this.bot = bot + "object"
    eval(this.bot + "=this")
    return this
}
//Makes the layer slide up
function measure(speedTr){
        if(parseInt(this.css.top)>-this.scrollHeight){
                this.css.top=parseInt(this.css.top)-prt_step
                setTimeout(this.bot+".up("+speedTr+")",speedTr)
        }else if(vac) {
                this.css.top=from
                eval(this.bot+".up("+speedTr+")")
          }
}
//Calls the object constructor,makes the slide object and starts the sliding.
        function igNite(){
                uSlide=makeArea('divPREFIX','preSlide')
                uSlide.css.top=from
                uSlide.up(speedTr)
                
        }

	