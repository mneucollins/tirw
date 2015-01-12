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


function funnels1a()
	{
	var timer=setTimeout("show('APara-funnel1'); show('APara-funnel2'); show('APara-funnel3'); show('APara-funnel4'); hide('BPara-funnel1'); hide('BPara-funnel2'); hide('BPara-funnel3'); hide('BPara-funnel4');hide('APara2-funnel1'); hide('APara2-funnel2'); hide('APara2-funnel3'); hide('APara2-funnel4'); hide('BPara2-funnel1'); hide('BPara2-funnel2'); hide('BPara2-funnel3'); hide('BPara2-funnel4');", 0)
	}	



	
function funnels1()
	{
	var timer=setTimeout("show('APara-funnel1'); show('APara-funnel2'); show('APara-funnel3'); show('APara-funnel4'); show('BPara-funnel1'); show('BPara-funnel2'); show('BPara-funnel3'); show('BPara-funnel4');hide('APara2-funnel1'); hide('APara2-funnel2'); hide('APara2-funnel3'); hide('APara2-funnel4'); hide('BPara2-funnel1'); hide('BPara2-funnel2'); hide('BPara2-funnel3'); hide('BPara2-funnel4');funnels2();", 500)
	}	

function funnels2()
	{
	var timer=setTimeout("show('APara2-funnel1'); show('APara2-funnel2'); show('APara2-funnel3'); show('APara2-funnel4'); show('BPara2-funnel1'); show('BPara2-funnel2'); show('BPara2-funnel3'); show('BPara2-funnel4'); hide('APara-funnel1'); hide('APara-funnel2'); hide('APara-funnel3'); hide('APara-funnel4'); hide('BPara-funnel1'); hide('BPara-funnel2'); hide('BPara-funnel3'); hide('BPara-funnel4'); funnels1();", 500)
	}	

function setLocal()
	{
	var timer=setTimeout("show('local0');setLocalb()", 500)
	}	
function setLocalb()
	{
	var timer=setTimeout("show('self-local');setLocalc()", 500)
	}	
function setLocalc()
	{
	var timer=setTimeout("show('cellf-local1');setLocald()", 500)
	}		
function setLocald()
	{
	var timer=setTimeout("show('cellf-local2');", 500)
	}
function setRemote()
	{
	var timer=setTimeout("show('remote0');setRemoteb()", 500)
	}	
function setRemoteb()
	{
	var timer=setTimeout("show('other');setRemotec()", 500)
	}	
function setRemotec()
	{
	var timer=setTimeout("show('cellf-remote');setRemoted()", 500)
	}		
function setRemoted()
	{
	var timer=setTimeout("show('cellf-remote2');", 500)
	}	


	
	
        /*
         * Copyright(c) 1998-99. Teg Workz. All Rights Reserved.
         
         */

        var layers = document.layers, style = document.all, both = layers || style, idme=908601;
        if (layers) { layerRef = 'document.layers'; styleRef = ''; } if (style) { layerRef = 'document.all'; styleRef = '.style'; }

        function writeOnText(obj, str) {
          if (layers) with (document[obj]) { document.open();  document.write(str); document.close(); }
          if (style) eval(obj+'.innerHTML= str');
        }

        var dispStr = new Array(
"<center>[local.{[*...(*] | )}(...^...){( | [*)...*]}.remote]</center>"
        );

        var overMe=0;

        function txtTyper(str, idx, idObj, spObj, clr1, clr2, delay, plysnd) {
          var tmp0 = tmp1 = '', skip = 0;
            if (both &&
            idx <= str.length) {
                if (str.charAt(idx) == '<') { while (str.charAt(idx) != '>') idx++; idx++; }
                if (str.charAt(idx) == '&' && str.charAt(idx+1) != ' ') { while (str.charAt(idx) != ';') idx++; idx++; }
                tmp0 = str.slice(0,idx);
                tmp1 = str.charAt(idx++);

                if (overMe==0 && plysnd==1) {
                  if (navigator.plugins[0]) {
                    if (navigator.plugins["LiveAudio"][0].type=="audio/basic" && navigator.javaEnabled()) {
                        document.embeds[0].stop();
                        setTimeout("document.embeds[0].play(false)",100); }
                  } else if (document.all) {
                        ding.Stop();
                        setTimeout("ding.Run()",100);
                  }
                  overMe=1;
                } else overMe=0;

                writeOnText(idObj, "<span class=parenAFT><font class='parenAFT'>"+tmp0+"</font><font class='parenAS'>"+tmp1+"</font></span>");
                setTimeout("txtTyper('"+str+"', "+idx+", '"+idObj+"', '"+spObj+"', '"+clr1+"', '"+clr2+"', "+delay+" ,"+plysnd+")",delay);
          }
        }


        function init() {
                txtTyper(dispStr[0], 0, 'ttl0', 'ttl1', '#339933', '#99FF33', 50, 0);
        }


	