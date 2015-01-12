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

	
	function riteVIIa()
	{
	var timer=setTimeout("show('DOUBLEa'); hide('DOUBLE0');riteVIIb()", 0)
	}
	function riteVIIb()
	{
	var timer=setTimeout("show('DOUBLEb'); hide('DOUBLEa'); riteVIIc()", 1000)
	}
	function riteVIIc()
	{
	var timer=setTimeout("show('DOUBLEc'); hide('DOUBLEb'); riteVIId()", 1000)
	}
	function riteVIId()
	{
	var timer=setTimeout("show('DOUBLEd'); hide('DOUBLEc'); riteVIIe()", 1000)
	}
	function riteVIIe()
	{
	var timer=setTimeout("show('DOUBLEe'); hide('DOUBLEd');riteVIIf()", 1000)
	}	
	function riteVIIf()
	{
	var timer=setTimeout("show('DOUBLEf'); hide('DOUBLEe');riteVIIg()", 1000)
	}	
	function riteVIIg()
	{
	var timer=setTimeout("show('DOUBLEg'); hide('DOUBLEf');riteVIIh()", 1000)
	}	
	function riteVIIh()
	{
	var timer=setTimeout("show('DOUBLEh'); hide('DOUBLEg');riteVIIi()", 1000)
	}	
	function riteVIIi()
	{
	var timer=setTimeout("show('DOUBLEi'); hide('DOUBLEh');riteVIIj()", 1000)
	}	
	function riteVIIj()
	{
	var timer=setTimeout("show('DOUBLEj'); hide('DOUBLEi');riteVIIk()", 1000)
	}	
	function riteVIIk()
	{
	var timer=setTimeout("show('DOUBLEk'); hide('DOUBLEj');riteVIIl()", 1000)
	}	
	function riteVIIl()
	{
	var timer=setTimeout("show('DOUBLEl'); hide('DOUBLEk');riteVIIm()", 1000)
	}	
	function riteVIIm()
	{
	var timer=setTimeout("show('DOUBLEm'); hide('DOUBLEl');riteVIIaa()", 1000)
	}	

	
	function riteVIIaa()
	{
	var timer=setTimeout("show('DOUBLEaa'); hide('DOUBLEm'); riteVIIbb()", 5000)
	}
	function riteVIIbb()
	{
	var timer=setTimeout("show('DOUBLEbb'); hide('DOUBLEaa'); riteVIIcc()", 1000)
	}
	function riteVIIcc()
	{
	var timer=setTimeout("show('DOUBLEcc'); hide('DOUBLEbb'); riteVIIdd()", 1000)
	}
	function riteVIIdd()
	{
	var timer=setTimeout("show('DOUBLEdd'); hide('DOUBLEcc'); riteVIIee()", 1000)
	}
	function riteVIIee()
	{
	var timer=setTimeout("show('DOUBLEee'); hide('DOUBLEdd');riteVIIff()", 1000)
	}	
	function riteVIIff()
	{
	var timer=setTimeout("show('DOUBLEff'); hide('DOUBLEee');riteVIIgg()", 1000)
	}	
	function riteVIIgg()
	{
	var timer=setTimeout("show('DOUBLEgg'); hide('DOUBLEff');riteVIIhh()", 1000)
	}	
	function riteVIIhh()
	{
	var timer=setTimeout("show('DOUBLEhh'); hide('DOUBLEgg');", 1000)
	}	
	
function goAnon()
{
window.location.href = ('03x-anon.html');
}

function closeOff()
{
self.close();
}
	

function closeTAB1()
	{
hide('TAB02');hide('TAB03');hide('TAB04');hide('TAB05');
	}
	function closeTAB2()
	{
hide('TAB01');hide('TAB03');hide('TAB04');hide('TAB05');
	}
	function closeTAB3()
	{
hide('TAB01');hide('TAB02');hide('TAB04');hide('TAB05');
	}	
	function closeTAB4()
	{
hide('TAB01');hide('TAB02');hide('TAB03');hide('TAB05');
	}
function closeTAB5()
	{
hide('TAB01');hide('TAB02');hide('TAB03');hide('TAB04');
	}	