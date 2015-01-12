
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
	var timer=setTimeout("show('DOUBLEa'); hide('DOUBLEc');riteVIIb()", 1000)
	}
	function riteVIIb()
	{
	var timer=setTimeout("hide('BLACKBOARDstart');show('DOUBLEb'); hide('DOUBLEa'); riteVIIc()", 1000)
	}
	function riteVIIc()
	{
	var timer=setTimeout("show('DOUBLEc'); hide('DOUBLEb'); riteVIIa()", 1000)
	}
	
var count = new Array( 2 );

function countInit( )
{
	for( var i = 0; i < 2 ; i++ )
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
		if( diget == 2 )
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

function startCounter()
{
	countInitNonZero( )
	showChanges( )
}