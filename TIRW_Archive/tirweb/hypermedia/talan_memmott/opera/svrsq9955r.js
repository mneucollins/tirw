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


	function being1()
	{
	var timer=setTimeout("being2(); show('kha');", 400)
	}
	function being2()
	{
	var timer=setTimeout("being3();show('khu');", 400)
	}
		function being3()
	{
	var timer=setTimeout("being4();show('ba');", 400)
	}
		function being4()
	{
	var timer=setTimeout("show('kaStart');", 400)
	}
	
		function bbeing1()
	{
	var timer=setTimeout("bbeing2(); show('kha2');hide('kha');", 400)
	}
	function bbeing2()
	{
	var timer=setTimeout("bbeing3();show('khu2');hide('khu');", 400)
	}
		function bbeing3()
	{
	var timer=setTimeout("bbeing4();show('ba2');hide('ba');", 400)
	}
		function bbeing4()
	{
	var timer=setTimeout("bbeing5();show('kaStart2');hide('kaStart');", 400)
	}
		function bbeing5()
	{
	var timer=setTimeout("show('kheperu2');hide('kheperu');", 400)
	}
	
				function allMAATon()
	{
	var timer=setTimeout("show('libLeft');show('libRight');show('MAAT-fig');", 0)
	}
	
	
			function allMAAT()
	{
	var timer=setTimeout("bbbeing1(); hide('neterGEN'); hide('libLeft');hide('libRight');hide('MAAT-a');hide('MAAT-b');hide('MAAT-fig');", 0)
	}
		function bbbeing1()
	{
	var timer=setTimeout("bbbeing2(); show('kha3');hide('kha2');", 400)
	}
	function bbbeing2()
	{
	var timer=setTimeout("bbbeing3();show('khu3');hide('khu2');", 400)
	}
		function bbbeing3()
	{
	var timer=setTimeout("bbbeing4();show('ba3');hide('ba2');", 400)
	}
		function bbbeing4()
	{
	var timer=setTimeout("bbbeing5();show('kaStart3');hide('kaStart2');", 400)
	}
		function bbbeing5()
	{
	var timer=setTimeout("show('kheperu3');hide('kheperu2');", 400)
	}	
	
	
	
	function goKa()
	{
	var timer=setTimeout("goKa2();show('NOTE-ka');", 400)
	}	
	function goKa2()
	{
	var timer=setTimeout("goKa3(); show('NOTE-ka2');hide('NOTE-ka');", 400)
	}		
	function goKa3()
	{
	var timer=setTimeout("goKa4(); show('NOTE-ka3');hide('NOTE-ka2');", 400)
	}
	function goKa4()
	{
	var timer=setTimeout("show('NOTE-ka4');hide('NOTE-ka3');", 400)
	}				
	
	function thtxt()
	{
	var timer=setTimeout("thtxt2();show('textA');", 0)
	}	
	function thtxt2()
	{
	var timer=setTimeout("hide('textA');", 20000)
	}
	
	
function exitGo()
{
var timer=setTimeout("exitExit()", 1000)
}
function exitExit()
{
window.location.href = ('02funnels.html');
}	