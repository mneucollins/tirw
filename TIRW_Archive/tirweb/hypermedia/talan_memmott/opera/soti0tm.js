

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



	function bronze1()
	{
	var timer=setTimeout("show('cycla');bronze2()", 0)
	}
	function bronze2()
	{
	var timer=setTimeout("show('cyclb'); hide('cycla');bronze3()", 1200)
	}
	function bronze3()
	{
	var timer=setTimeout("show('cyclc');hide('cycla0b');hide('cyclb');bronze4()", 1200)
	}
	function bronze4()
	{	
	var timer=setTimeout("show('cycld'); hide('cyclc');bronze5()", 1200)
	}
	function bronze5()
	{	
	var timer=setTimeout("show('cycle'); hide('cycld');bronze6()", 1200)
	}
	function bronze6()
	{	
	var timer=setTimeout("show('cyclf'); hide('cycle');bronze7()", 1200)
	}
	function bronze7()
	{	
	var timer=setTimeout("show('cyclg'); hide('cyclf');bronze8()", 1200)
	}
	function bronze8()
	{	
	var timer=setTimeout("show('cyclh'); hide('cyclg');bronze9()", 1200)
	}
	function bronze9()
	{	
	var timer=setTimeout("show('cycli'); hide('cyclh');bronze10()", 1200)
	}
	function bronze10()
	{	
	var timer=setTimeout("show('cyclj'); hide('cycli');bronze11()", 1200)
	}
	function bronze11()
	{
	var timer=setTimeout("show('thera000'); hide('cyclj');", 1200)
	}

	function onWard()
	{
	var timer=setTimeout("pulse3();", 6000)
	}
function pulse3()
{
window.location.href = ('02funnels.html');
}	