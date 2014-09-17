
<script>
   $( document ).ready(function() {
    //index.php?action=timeline   


//// /////////////////////////// get json des references /////////////////////////// /////////////////////////// /////////////////////////// 
$.getJSON("./json/refs.json",function(result){
    var noeux = 0;
    $.each(result.references, function(i, field){     
noeux++;
$("#sliderContent").append("<li class=\"slide\"><h2>"+field.titre+"</h2><div class=\"slideImg\"><img src=\"./img/slides/"+field.img+"\" /></div><div class=\"slideDesc\"><strong>Description: </strong>"+field.desc+"</div><div class=\"slideTech\"><strong>Technique: </strong> "+field.tech+"</div></li>");
    });
    var tailleUL=(noeux * 940) + 940;
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
    $("#sliderContent").animate({left: "+=981px"},800);
    }   
    else if (posAct <= 0 ) { posAct=maxPos; $("#sliderContent").animate({left: "-"+((noeux * 981)-981)},800); }
}

function mooveRight () {
    if (posAct<maxPos) {
        posAct++;
    $("#sliderContent").animate({left: "-=981px"},800);
    } else {posAct=0; $("#sliderContent").animate({left: 0},800); }
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




