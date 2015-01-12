


function deTerminator(){
        this.ver=navigator.appVersion
        this.dom=document.getElementById?1:0
        this.ie5=(this.ver.indexOf("MSIE 5")>-1 && this.dom)?1:0;
        this.ie4=(document.all && !this.dom)?1:0;
        this.ns5=(this.dom && parseInt(this.ver) >= 5) ?1:0;
        this.ns4=(document.layers && !this.dom)?1:0;
        this.perc=(this.ie5 || this.ie4 || this.ns4 || this.ns5)
        return this
}
perc=new deTerminator()


var speed=24

var loop, timer

function ConstructArea(obj,nest){
    nest=(!nest) ? '':'document.'+nest+'.'
        this.el=perc.dom?document.getElementById(obj):perc.ie4?document.all[obj]:perc.ns4?eval(nest+'document.'+obj):0;
        this.css=perc.dom?document.getElementById(obj).style:perc.ie4?document.all[obj].style:perc.ns4?eval(nest+'document.'+obj):0;
        this.ActivateHeight=perc.ns4?this.css.document.height:this.el.offsetHeight
        this.clipHeight=perc.ns4?this.css.clip.height:this.el.offsetHeight
        this.up=INvertAction;this.down=vertAction;
        this.Cine=Cine; this.x; this.y;
    this.obj = obj + "Object"
    eval(this.obj + "=this")
    return this
}
function Cine(x,y){
        this.x=x;this.y=y
        this.css.left=this.x
        this.css.top=this.y
}

function vertAction(move){
        if(this.y>-this.ActivateHeight+oCont.clipHeight){
                this.Cine(0,this.y-move)
                        if(loop) setTimeout(this.obj+".down("+move+")",speed)
        }
}

function INvertAction(move){
        if(this.y<0){
                this.Cine(0,this.y-move)
                if(loop) setTimeout(this.obj+".up("+move+")",speed)
        }
}

function letItGo(speed){
        if(loaded){
                loop=true;
                if(speed>0) oActivate.down(speed)
                else oActivate.up(speed)
        }
}

function slipLess(){
        loop=false
        if(timer) clearTimeout(timer)
}

var loaded;
function ActivateMech(){
        oCont=new ConstructArea('txtArea')
        oActivate=new ConstructArea('txtActual','txtArea')
        oActivate.Cine(0,0)
        oCont.css.visibility='visible'
        loaded=true;
}
onload=ActivateMech;
