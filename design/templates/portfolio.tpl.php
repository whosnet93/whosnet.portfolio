
<script>
   $( document ).ready(function() {
    //index.php?action=timeline   


//// /////////////////////////// get json des references /////////////////////////// /////////////////////////// /////////////////////////// 
$.getJSON("./json/results.json",function(result){
    var noeux = 0;
    $.each(result.references, function(i, field){     
noeux++;
$("#sliderContent").append("<li class=\"slide\" id=\"slide-"+field.id+"\"  data-bg=\""+field.bg+"\" ><h2>"+field.titre+"</h2><div class=\"slideImg\"><img src=\"./img/slides/"+field.img+"\" /></div><div class=\"slideDesc\"><strong>Description: </strong>"+field.desc+"</div><div class=\"slideTech\"><strong>Technique: </strong> "+field.tech+"</div></li>");

if (i===0) {  $('#bgIntro').css('background','url(../img/bg/'+field.bg+') repeat center center fixed'); }

   });
   
   var tailleEcran=$( window ).width();
    var tailleUL=(noeux * tailleEcran) + tailleEcran;
    
    
      $("#sliderContent").css("width",tailleUL + "px");
      
      
      var posAct=0;
      var maxPos=noeux-1;
      var minPos=0;
      
      
$( "#prevS" ).click(function() {
mooveLeft();
});    
      
$( "#nextS" ).click(function() {
mooveRight();
});




function mooveLeft () {
    
    if ( posAct > 0) { 
    posAct--;
    var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
        $('#bgIntro').css('background','url(../img/bg/'+bgAct+') repeat center center fixed');
    $("#sliderContent").animate({left: "+=981px"},800);
    }   
    else if (posAct <= 0 ) {
        
            posAct=maxPos; $("#sliderContent").animate({left: "-"+((noeux * 981)-981)},800); 
            var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
        $('#bgIntro').css('background','url(../img/bg/'+bgAct+') repeat center center fixed');
        }
}

function mooveRight () {
    

if (posAct<maxPos) {
        posAct++;
        
var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
$('#bgIntro').css('background','url(../img/bg/'+bgAct+') repeat center center fixed');

        
    $("#sliderContent").animate({left: "-=981px"},800);
    } else {
        posAct=0; $("#sliderContent").animate({left: 0},800);
        var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
        $('#bgIntro').css('background','url(../img/bg/'+bgAct+') repeat center center fixed');
    }
}


      
  });
/////////////////////////// /////////////////////////// /////////////////////////// /////////////////////////// /////////////////////////// 
       
  });//fin document ready

</script>



<div id="bgIntro"></div>

    
<div id="all">
    
    <div id="sliderWhosnet">
       <ul id="sliderContent"> 
       
         </ul>
    </div>
    
    
    
<ul id="activityContent">
    <li class="blocContent"></li>
    <li class="blocContent"></li>
    <li class="blocContent"></li>
</ul>
    
<img id="prevS" src="../img/prevSlide.png" />
<img id="nextS" src="../img/nextSlide.png" />
 
    
</div>

<div id="trame"></div>  

 
<div id="bgLoading">  
<div id="loadingBar">  

</div>

    <div id="loadingZone"> 
        
        <div id="loadingSms">Chargement<br>en cours ...</div>  
        <div id="loadingTitle"></div>
        <div id="infoLoading"></div>
        <br class="clear" />
    </div>  
</div>  




