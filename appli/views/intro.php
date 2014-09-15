
<script>
   $( document ).ready(function() {
    //index.php?action=timeline   
       
$( "#startBut" ).click(function() {
    
    
var screenlargeur=$( window ).width();
var double   = screenlargeur * 2;

 $( "#cercle" ).css('width',"2px");
$( "#cercle" ).css('height',"2px");
$( "#cercle" ).css('top','-1px');
$( "#cercle" ).css('left','-1px');
$( "#cercle" ).css('display','none');   
  
$( "#cercle" ).css('display','block').animate({
    width:double+"px",
    height:double+"px",
    top:"-"+screenlargeur+"px",
    left:"-"+screenlargeur+"px"
}, 300,"easeInCirc", function () { window.location = 'index.php?action=timeline'; } );
});
       
       
  });//fin document ready

</script>

<div id="cercle"></div>


<div id="bgIntro"></div>
<div id="trame"></div>  
<div id="txtIntro">
<img src="img/titreIntro.png" alt="Mathias Schmied" titre="Mathias Schmied" />
<h2>TimeLine Portfolio</h2>
<p>« [...] Fou de papier et de dessin. De papier et de dessin de toutes sortes. S’il a fait de celui-ci une pratique quasi exclusive et s’il use de celui-là pour matière première de son travail, il les a tous deux instruits à l’ordre d’une esthétique pleinement innovante… Textes et images sont en effet les ingrédients récurrents avec lesquels il ne cesse de composer  [...] »</p>
<div id="startBut">Commencer la visite</div>
</div>  




<div id="trame2"></div> 
<div id="bgLoading">  
<div id="loadingBar">  
<div id="progressBar"></div>  
</div>
<div id="infoLoading"></div>
    <div id="loadingZone"> 
        <div id="loadingTitle">
        <img src="img/titreIntroBlanc.png" alt="Mathias Schmied" titre="Mathias Schmied" />
        </div>
        <div id="loadingSms">Chargement en cours ...</div>  
        <br class="clear" />
    </div>  
</div>  


