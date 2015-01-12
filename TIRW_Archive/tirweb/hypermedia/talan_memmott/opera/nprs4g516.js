
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
"<center>[FUNCTION=(); {ex=0:|:else=?}] [FUNCTION=(); {ex=0 :|: else=?}:|:{(I(x)I)} :|: {(I)...(x)} ;()=FUNCTION] [FUNCTION=(); {(I(x)I)}:|:{(I)...(x)}]</center>"
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

                writeOnText(idObj, "<span class=megaT4><font class=megaT4>"+tmp0+"</font><font class=megaT4>"+tmp1+"</font></span>");
                setTimeout("txtTyper('"+str+"', "+idx+", '"+idObj+"', '"+spObj+"', '"+clr1+"', '"+clr2+"', "+delay+" ,"+plysnd+")",delay);
          }
        }

        function init() {
                txtTyper(dispStr[0], 0, 'ttl0', 'ttl1', '#000000', '#000000', 200, 0);
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
