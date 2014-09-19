
<script>
   $( document ).ready(function() {
    //index.php?action=timeline   

//// /////////////////////////// get json des references /////////////////////////// /////////////////////////// /////////////////////////// 
$.getJSON(json_file,function(result){
    var noeux = 0;
    $.each(result.references, function(i, field){     
noeux++;
$("#sliderContent").append("<li class=\"slide\" id=\"slide-"+field.id+"\"  data-bg=\""+field.bg+"\" >\n\
    <h2><a href=\""+field.url+"\" target=\"blank\"> "+field.titre+"</a></h2>\n\
    <div class=\"slideImg\"><img src=\""+chemin_slides+field.img+"\" /></div>\n\
                    <div class=\"visitUrl\" id=\"url-"+field.id+"\"><a href=\""+field.url+"\" target=\"blank\">Visiter le site</a></div>\n\
</li>");


$("#sliderBottom").append("<li><div class=\"slideDesc\"><strong>Description: </strong>"+field.description+"</div>\n\
    <div class=\"slideTech\"><strong>Technique: </strong> "+field.tech+"</div></li>\n\
");
//
if (i===0) {  
    $('#bgIntro').css('background','url('+chemin_bg+field.bg+') repeat center center fixed');
        }


$( "#slide-"+field.id ).mouseenter(function() {
    $( "#url-"+field.id ).show();
});

$( "#slide-"+field.id ).mouseleave(function() {
    $( "#url-"+field.id ).hide();
});

   });
   
   
   



   
var tailleEcran=$( window ).width();
var tailleUL=(noeux * tailleEcran) + tailleEcran;
var moitieEcran = $( window ).height()/2;
var defTailleEcran=$( window ).width();

$(".slide").css('width',tailleEcran);
$("#sliderContent").css("width",tailleUL + "px");
$("#sliderBottom").css("width",tailleUL + "px");
$("#sliderWhosnet").css("height",moitieEcran + "px");
$("#sliderBottom").css("height",moitieEcran + "px");

$("#sliderBottom li").css('width',tailleEcran + "px");
$("#sliderBottom li").css("height",moitieEcran + "px");
 
 $(".slideImg img").css("max-height",(moitieEcran-20) + "px");

 

//  var tailleEcran=$( window ).width();
//    var defTailleEcran=$( window ).width();
//    var tailleUL=(noeux * tailleEcran) + tailleEcran;
//    var moitieEcran = $( window ).height()/2;
    ////////////////////////////////

///////////////////// RESIZE

$( window ).resize(function() {
    
    calcul();
    reposition ();
    
});

/////////////////////////////////////////////////////////////// 
  function pxToNumber (px) { 
       nombre = px.slice(0,-2);
       return parseInt(nombre);
    }

function reposition () { 
    $(".slide").css('width',tailleEcran);
    $("#sliderContent").css("width",tailleUL + "px");
    $("#sliderBottom").css("width",tailleUL + "px");
    $("#sliderWhosnet").css("height",moitieEcran + "px");
    $("#sliderBottom").css("height",moitieEcran + "px");
    $("#sliderBottom li").css('width',tailleEcran  + "px");
    $("#sliderBottom li").css("height",moitieEcran + "px"); 
    
    var actualPosUL = pxToNumber($("#sliderContent").css('left'));
    
    var diffTailleEcran = defTailleEcran - tailleEcran;

    
    var newPosUL = (tailleEcran*posAct)+(42*(posAct));
    var newPosULbot = (tailleEcran*posAct);
    if (posAct!==0) { 
        $("#sliderContent").css('left',"-"+newPosUL+"px");
        $("#sliderBottom").css('left',"-"+newPosULbot+"px");
       
    }
    
$(".slideImg img").css("max-height",(moitieEcran-20) + "px");
    
} // fin reposition

function calcul() {
    tailleEcran=$( window ).width();
    tailleUL=(noeux * tailleEcran) + tailleEcran;
    moitieEcran = $( window ).height()/2;    
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



//////////////////////////////////////////////////////////////
function mooveLeft () {
    
      calcul();
      

if ($( "#prevS" ).attr("rel")!=="CLICKED") { 
    $( "#prevS" ).attr("rel","CLICKED");
    
    if ( posAct > 0) { 
    posAct--;
    var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
    var bgActFile=chemin_bg+bgAct;
      $('#bgIntro').fadeOut();
    $("#sliderContent").animate({left: "+="+(tailleEcran+42)+"px"},800,function () { 
                    $('#bgIntro').css('background','url('+bgActFile+') repeat center center fixed'); 
                    $('#bgIntro').fadeIn();
                    $( "#prevS" ).attr("rel",""); 
                });
    $("#sliderBottom").animate({left: "+="+(tailleEcran+posAct+1)+"px"},800);
    }   
    else if (posAct <= 0 ) {        
            posAct=maxPos; 
            $('#bgIntro').fadeOut();
                    $("#sliderContent").animate({left: "-"+((noeux * tailleEcran)-(tailleEcran-42*(posAct)))},800,function () {
                        $( "#prevS" ).attr("rel",""); 
                        $('#bgIntro').css('background','url('+bgActFile+') repeat center center fixed');
                        $('#bgIntro').fadeIn();
                    });
            $("#sliderBottom").animate({left: "-"+((noeux * tailleEcran)-(tailleEcran-5))},800);
            var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
            var bgActFile=chemin_bg+bgAct;
        
        }
        }//if pas CLICKED
} //////////////////////////////////////////////////// fin fonction mooveLeft

function mooveRight () {
    
     calcul();
    
    if ($( "#nextS" ).attr("rel")!=="CLICKED") {
            $( "#nextS" ).attr("rel","CLICKED");

            if (posAct<maxPos) {
                    posAct++;

            var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
            var bgActFile=chemin_bg+bgAct;
            $('#bgIntro').fadeOut();            
                $("#sliderContent").animate({left: "-="+(tailleEcran+42)+"px"},800,function () { 
                            $('#bgIntro').css('background','url('+bgActFile+') repeat center center fixed');
                            $('#bgIntro').fadeIn();
                            $( "#nextS" ).attr("rel","");
                        });
                $("#sliderBottom").animate({left: "-="+(tailleEcran)+"px"},800);
                } else {
                    posAct=0; 
                    $('#bgIntro').fadeOut();
                     var bgAct=$("#slide-"+(posAct+1)).attr("data-bg");
                    var bgActFile=chemin_bg+bgAct;
                            $("#sliderContent").animate({left: 0},800, function () { 
                                    $('#bgIntro').css('background','url('+bgActFile+') repeat center center fixed'); 
                                    $('#bgIntro').fadeIn();
                            $( "#nextS" ).attr("rel","");   
                            });
                    $("#sliderBottom").animate({left: 0},800);
                   
                         
                     }
    }
}/// fin mooveright


      
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




