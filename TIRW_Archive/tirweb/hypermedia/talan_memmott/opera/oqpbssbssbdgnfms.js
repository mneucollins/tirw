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




function startLex()
	{
	var timer=setTimeout("show('lex00a');goLexB()", 0)
	}	
function goLexB()
	{
	var timer=setTimeout("hide('lex00a');show('lex00b');goLexC()", 1000)
	}
function goLexC()
	{
	var timer=setTimeout("hide('lex00b');show('lex00c');", 1000)
	}
/FUNNEL FLIPS/


function echoREVA()
	{
	var timer=setTimeout("show('APara-funnel1'); hide('BLACKBOARD');echoREVA2()", 0)
	}	
function echoREVA2()
	{
	var timer=setTimeout("show('APara-funnel2'); hide('APara-funnel1'); echoREVA3()", 250)
	}	
function echoREVA3()
	{
	var timer=setTimeout("show('APara-funnel3');hide('APara-funnel2');echoREVA4()", 250)
	}
function echoREVA4()
	{
	var timer=setTimeout("show('APara-funnel4');hide('APara-funnel3');", 250)
	}	

function echoREVOUT()
	{
	var timer=setTimeout("hide('APara-funnel4'); show('APara-funnel3');show('BLACKBOARD');echoREVOUT2()", 0)
	}	
function echoREVOUT2()
	{
	var timer=setTimeout("hide('APara-funnel3'); show('APara-funnel2'); echoREVOUT3()", 250)
	}	
function echoREVOUT3()
	{
	var timer=setTimeout("hide('APara-funnel2');show('APara-funnel1');echoREVOUT4()", 250)
	}
function echoREVOUT4()
	{
	var timer=setTimeout("hide('APara-funnel1');", 250)
	}			

function overOut()
	{
	var timer=setTimeout("hide('Para-funnelX'); hide('Para-funnelY');hide('Para-funnelZ');", 0)
	}	




function outy1()
	{
	var timer=setTimeout("show('Para-funnelZ');outy2()", 0)
	}	
function outy2()
	{
	var timer=setTimeout("show('Para-funnelY');outy3()", 500)
	}	
function outy3()
	{
	var timer=setTimeout("show('Para-funnelX');", 500)
	}	

function paren1()
	{
	var timer=setTimeout("show('paren1');paren2(); hide('FACE00')", 0)
	}	
	function paren2()
	{
	var timer=setTimeout("show('paren2');hide('paren1');paren3()", 250)
	}	
	function paren3()
	{
	var timer=setTimeout("show('grid');show('paren3');hide('paren2');paren4()", 250)
	}
	function paren4()
	{
	var timer=setTimeout("show('paren4'); hide('grid');hide('paren3');paren5()", 250)
	}
	function paren5()
	{
	var timer=setTimeout("show('paren5');hide('paren4');paren6();", 250)
	}
	function paren6()
	{
	var timer=setTimeout("show('paren6');hide('paren5');show('gridGreen');", 250)
	}


function flux1()
	{
	var timer=setTimeout("hide('Para-funnelX'); hide('Para-funnelY');show('Para-funnelZ');flux2()", 150)
	}	
function flux2()
	{
	var timer=setTimeout("hide('Para-funnelX'); show('Para-funnelY');hide('Para-funnelZ');flux3()", 150)
	}	
function flux3()
	{
	var timer=setTimeout("show('Para-funnelX'); hide('Para-funnelY');hide('Para-funnelZ');flux4()", 150)
	}	
function flux4()
	{
	var timer=setTimeout("hide('Para-funnelX'); show('Para-funnelY');hide('Para-funnelZ');flux5()", 150)
	}	
function flux5()
	{
	var timer=setTimeout("hide('Para-funnelX'); hide('Para-funnelY');show('Para-funnelZb');hide('eye-line1'); show('eye-line2');", 150)
	}	
