
<script>
   $( document ).ready(function() {
    //index.php?action=timeline   

//// /////////////////////////// get json des references /////////////////////////// /////////////////////////// /////////////////////////// 
$.getJSON(json_file,function(result){
    var noeux = 0;
    $.each(result.references, function(i, field){     
noeux++;
$("#sliderContent").append("<li class=\"slide\" id=\"slide-"+field.id+"\"  data-bg=\""+field.bg+"\" >\n\
    <h2>"+field.titre+"</h2>\n\
    <div class=\"slideImg\"><img src=\""+chemin_slides+field.img+"\" /></div>\n\
            </li>");


$("#sliderBottom").append("<li><div class=\"slideDesc\"><strong>Description: </strong>"+field.description+"</div>\n\
    <div class=\"slideTech\"><strong>Technique: </strong> "+field.tech+"</div></li>");
//
if (i===0) {  
    $('#bgIntro').css('background','url('+chemin_bg+field.bg+') repeat center center fixed');
        }

   });
   


   
var tailleEcran=$( window ).width();
var tailleUL=(noeux * tailleEcran) + tailleEcran;
var moitieEcran = $( window ).height()/2;

$(".slide").css('width',tailleEcran);
$("#sliderContent").css("width",tailleUL + "px");
$("#sliderBottom").css("width",tailleUL + "px");
$("#sliderWhosnet").css("height",moitieEcran + "px");
$("#sliderBottom").css("height",moitieEcran + "px");

$("#sliderBottom li").css('width',tailleEcran);
$("#sliderBottom li").css("height",moitieEcran + "px")
 


///////////////////// RESIZE

$( window ).resize(function() {
    
    calcul();
    reposition ();
    
});

/////////////////////////////////////////////////////////////// 

function reposition () { 
    $(".slide").css('width',tailleEcran);
    $("#sliderContent").css("width",tailleUL + "px");
    $("#sliderBottom").css("width",tailleUL + "px");
    $("#sliderWhosnet").css("height",moitieEcran + "px");
    $("#sliderBottom").css("height",moitieEcran + "px");
    $("#sliderBottom li").css('width',tailleEcran);
    $("#sliderBottom li").css("height",moitieEcran + "px");
}

function calcul() {
    var tailleEcran=$( window ).width();
    var tailleUL=(noeux * tailleEcran) + tailleEcran;
    var moitieEcran = $( window ).height()/2;

    }


      
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
    
      calcul();
      

    if ( posAct > 0) { 
    posAct--;
    var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
    var bgActFile=chemin_bg+bgAct;
    
    $('#bgIntro').css('background','url('+bgActFile+') repeat center center fixed');
    $("#sliderContent").animate({left: "+="+tailleEcran+"px"},800);
    $("#sliderBottom").animate({left: "+="+tailleEcran+"px"},800);
    }   
    else if (posAct <= 0 ) {        
            posAct=maxPos; 
            $("#sliderContent").animate({left: "-"+((noeux * tailleEcran)-tailleEcran)},800);
            $("#sliderBottom").animate({left: "-"+((noeux * tailleEcran)-tailleEcran)},800);
            var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
            var bgActFile=chemin_bg+bgAct;
        $('#bgIntro').css('background','url('+bgActFile+') repeat center center fixed');
        }
}

function mooveRight () {
    
     calcul();
    

if (posAct<maxPos) {
        posAct++;
        
var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
var bgActFile=chemin_bg+bgAct;

$('#bgIntro').css('background','url('+bgActFile+') repeat center center fixed');

        sliderBottom
    $("#sliderContent").animate({left: "-="+tailleEcran+"px"},800);
    $("#sliderBottom").animate({left: "-="+tailleEcran+"px"},800);
    } else {
        posAct=0; 
        $("#sliderContent").animate({left: 0},800);
        $("#sliderBottom").animate({left: 0},800);
        var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
        var bgActFile=chemin_bg+bgAct;
        $('#bgIntro').css('background','url('+bgActFile+') repeat center center fixed');
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
    
    <div id="sliderBottomContent" >
        <ul id="sliderBottom">
            
        </ul>
    </div>
    
<!--<ul id="activityContent">
    <li class="blocContent"></li>
    <li class="blocContent"></li>
    <li class="blocContent"></li>
</ul>-->
    
<img id="prevS" src="<?php echo CHEMIN_IMG; ?>prevSlide.png" />
<img id="nextS" src="<?php echo CHEMIN_IMG; ?>nextSlide.png" />
 
    
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




