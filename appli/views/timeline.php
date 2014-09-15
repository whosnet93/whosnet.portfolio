<?php

$jsonData = json_decode(file_get_contents('json/results.json'));
/*
echo '<pre>';
print_r($jsonData); 
echo '</pre>';
*/

?>
<script>
    
$( document ).ready(function() {

/////////////////// cercle INTRO ---------------------------------------
var screenlargeur=$( window ).width();
var double   = screenlargeur * 2;
$( "#cercle" ).css('display','block');
$( "#cercle" ).css('width',double+"px");
$( "#cercle" ).css('height',double+"px");
$( "#cercle" ).css('top','-'+screenlargeur+"px");
$( "#cercle" ).css('left','-'+screenlargeur+"px");




$( "#cercle" ).delay(500).animate({
    width:"2px",
    height:"2px",
    top:"-1px",
    left:"-1px"
}, 1300,"easeInCirc", function () { $(this).css('display','none');  } );
/////////////////// ---------------------------------------



$.getJSON( "json/results.json", function( data ) {
    
var compteAnnees = 0;
var compteEvenement = 0;
var anneeEvent;
var lastYear;
var compteAnneeEvent=0;
var eventCount;
var mois;
var moisEvent;
var jourEvent;
var anEvent;
var dateClick;
var i2=0;
var loop=0;

/* ------------------------------- */ 

/// construction de la timeline de l'année/mois
for (var i=1;i<13;i++) { 
    
    /// LOL :)
    if (i===1) { mois="Janvier"; }
    if (i===2) { mois="Février"; }
    if (i===3) { mois="Mars"; }
    if (i===4) { mois="Avril"; }
    if (i===5) { mois="Mai"; }
    if (i===6) { mois="Juin"; }
    if (i===7) { mois="Juillet"; }
    if (i===8) { mois="Août"; }
    if (i===9) { mois="Septembre"; }
    if (i===10) { mois="Octobre"; }
    if (i===11) { mois="Novembre"; }
    if (i===12) { mois="Décembre"; }
    
$("#anneesMois").append("<li id='" + i+ "'>" + mois + "<div class='tooltipMois'><div class='tooltipMoisArr'></div></div></li>" ); 

$("#evenements").append("<li class='eventPlace' id='eventPlace_" + i+ "'></li>" ); 
    }




$.each( data, function( year ) {
      
//console.log(year); 
compteAnnees++;
$("#annees").append("<li class='on' id='" + year + "'>" + year + "</li>" );
$('#tooltips').append("<li class='tooltipAnnees' id='toolT"+year+"'><div class='tooltipAnneesArr'></div></li>");

/// positionnement des tooltips
if (i2===0) { $('#toolT'+year).css('left','0'); }
else { $('#toolT'+year).css('left',i2); }
i2=i2+70;




/// Evenement souris sur les années
$( '#'+year ).mouseover(function() {
$('#toolT'+year).css('display','block');
});

$( '#'+year ).mouseout(function() {
$('#toolT'+year).css('display','none');
});



$.each( data[year], function( key) {
        //console.log(data[year][key]); // all key
        anneeEvent=data[year][key][4].substring(0, 4);
        if ( anneeEvent===lastYear ) {compteAnneeEvent++;} else {compteAnneeEvent=1; }
        lastYear=anneeEvent;
    }); /// fin boucle
    

    

/// ajout des calcul de nombre d'event par année
if (compteAnneeEvent>1) { eventCount=" évenements"; } else { eventCount=" évenement"; }
$('#toolT'+year).append('<div class="compteEvent">'+compteAnneeEvent+eventCount+'  </div>');
});





/* ********************** INIT ************************ */
var widthAnnees=compteAnnees*70;
var widthMois=12*100;
$('#annees').css('width',widthAnnees+"px");
$('#anneesMois').css('width',widthMois+"px");
$('#tooltips').css('width',widthAnnees+"px");
$('#evenements').css('width',widthMois+"px");


////////////////// ANIM ////////////
//anim' timeline intro
$("#timeline").delay(1400).fadeIn(400,function () {
    $("#timeline").delay(600).animate({
    width:"100%"
}, 200,"easeInCirc", function () { 
    
    /// arrivé des années
$("#annees li").each(function(i) {
$(this).delay(200*i).animate({
top: "-=35"
}, 900,"easeOutBounce");
});
    
    $("#timeline").delay(600).animate({
    height:"30px"
}, 200,"easeInCirc" );}) ;


    });




///////////////////////////////////////////////////////////////
$( '#annees li' ).click(function() { 
var anneeCliquee=$(this).attr('id');
console.log(anneeCliquee);
 

 $( '#annees li' ).attr('class','off');
 
 
var year = $.each( data, function( year ) {
$.each( data[year], function( key) {
moisEvent=data[year][key][4].substring(5, 7);
moisEvent=parseInt(moisEvent);
jourEvent=data[year][key][4].substring(9, 11);
jourEvent=parseInt(moisEvent);
anEvent=data[year][key][4].substring(0, 4);

if (anEvent===anneeCliquee) { 
    //// place un icon sur le temps
$('#eventPlace_'+moisEvent).append("<img src='img/icons/oeuvres.png' class='iconEvent' id='iconEvent_"+data[year][key][4]+"' /> <span>Oeuvres</span>");
/// gestion du click sur l'event : 
$('#iconEvent_'+data[year][key][4]).click(function() { console.log (data[year][key][4]); });
        }//fin if 
    });/// fin boucle 2
}); // fin boucle 1


////////////////////////////// transition années / mois
///// disparition de années   
/// replacement des mois
$("#anneesMois li").css('top','30px');
/// arrivé des mois
$("#anneesMois li").each(function(i) {
$(this).delay(200*i).animate({
top: "0"
}, 900,"easeOutBounce");
});


//anim' timeline
$("#timeline").animate({
    height:"2px"
}, 200,"easeInCirc", function () { 
    ///on complete:
$("#annees li").fadeOut(200);

$("#timeline").animate({height:"30px"}, 300,"easeInCirc", function () { 
    $("#temps").css('height','1px');
        $("#temps").delay(200).animate({width:"100%"}, 600,"easeInCirc", function (){
            $("#temps").animate({height:"100px"},1200,"easeOutElastic", function () { 
$('#retour').css('display','block');
$('#retour').delay(600).animate({bottom:"225px"},1200,"easeOutElastic");
$('.eventPlace').css('display','block');  

                $('.eventPlace').animate({height:"100px"},300,"easeInCirc", function () { 
                    $('.eventPlace span').css('display','block');
                    $('.eventPlace img').css('display','block');  
                }); 
            });
        });
    }); 
});
    }); // fin click 



////////////// gestion du click retour
$('#retour').click(function() { 
$("#annees li").attr('class','on');
                 $('#retour').animate({bottom:"160px"},300,"easeInCirc", function (){  
                  $('#retour').css('display','none');
                 $("#temps").animate({height:"1px"}, 600,"easeInCirc", function (){ 
                 $('.eventPlace span').css('display','none');
                 $('.eventPlace img').css('display','none');
                 $('.eventPlace').css('display','none');   
                 $("#temps").animate({width:"0%"}, 600,"easeInCirc", function (){ 
             $("#timeline").animate({ height:"2px"}, 200,"easeInCirc", function () { 
                    $("#anneesMois li").css('top','30px');
             $("#timeline").animate({ height:"30px"}, 200,"easeInCirc", function (){  
                    $("#annees li").each(function(i) {
                    $(this).delay(200*i).css('display','block');
                    });
                   $('#evenements li').find('img').remove();
                   $('#evenements li').find('span').remove();
                   $('.eventPlace').css('height','0px'); 
                     }); 
                });
            });
        });
    });      
});//fin retour


///////////////// On Rezise et slider
var docH=$( document ).height();
var docW=$( document ).width();
var anneesW = $('#annees').width();
var moisW = $('#anneesMois').width();
var depasseM;
var maxNext;
var nbrClickNext=0;
var doneSlide=0;
var doneSlideBack=0;
var moove=0;


//////////////////////////////////////////////

function getWidth() {
    if (self.innerWidth) {
       return self.innerWidth;
    }
    else if (document.documentElement && document.documentElement.clientHeight){
        return document.documentElement.clientWidth;
    }
    else if (document.body) {
        return document.body.clientWidth;
    }
    return 0;
}


function checkSizes () {
docH=$( document ).height();
docW=$( document ).width();


    
//// LES ANNÉES
if ($( '#annees li' ).attr('class')==='on') {
if (docW-60<anneesW ) { 
    $( '#prev' ).css('display', 'block');
    $( '#next' ).css('display', 'block');
        } else {
    $( '#prev' ).css('display', 'none');
    $( '#next' ).css('display', 'none'); 
        }
 }
/// LES MOIS
if ($( '#anneesMois li' ).css('top')==='0px') {
if (docW<moisW)  { 
        depasseM=moisW-docW;
        $( '#prev' ).css('display', 'block');
        $( '#next' ).css('display', 'block'); 
    }  else { 
        $( '#prev' ).css('display', 'none');
        $( '#next' ).css('display', 'none');
    }
}
//nbrClickNext=0;
    }// fin checkSIze  
    //

////////////////////////////////////////////


$( window ).resize(function() {
checkSizes ();
slider ();
maxNext=(($( '#anneesMois' ).offset().left)-depasseM)-50;

if ($('#anneesMois').width()<$( document ).width()) { 
    $('#anneesMois').css("position","relative");
    $('#anneesMois').animate({marginLeft:-600+"px",left:"50%"},300,"easeInCirc");
    $('#evenements').animate({marginLeft:-600+"px",left:"50%"},300,"easeInCirc");
    }

});




//////////////////// fonction slider
function slider () { 

    /// pour les mois:
if ($( '#anneesMois li' ).css('top')==='0px') {

    
$( '#prev' ).click(function() {
  
   
if ($(this).attr('alt')!=='pause') { 
   if ($( '#anneesMois' ).offset().left>=100) { return false; }
   else { 
       $(this).attr('alt','pause');
    $( '#anneesMois' ).animate({marginLeft:"+="+200},300,"easeInCirc",function () {$( '#prev' ).attr('alt','');} );
    $( '#evenements' ).animate({marginLeft:"+="+200},300,"easeInCirc");
    }
   } else {return false; }

   
});// fin click prev
////////////////////////////////////////////////////

$( '#next' ).click(function() {
    

    var maxSlide=-1200+docW;
    var slideSize = moisW/(parseInt(moisW/docW));
   
  
  if ($(this).attr('alt')!=='pause') { 
   if ($( '#anneesMois' ).offset().left<=maxSlide) { return false; }
   else { 
       $(this).attr('alt','pause');
    $( '#anneesMois' ).animate({marginLeft:"-="+200},300,"easeInCirc",function () {$( '#next' ).attr('alt','');} );
    $( '#evenements' ).animate({marginLeft:"-="+200},300,"easeInCirc");
 console.log ($( '#anneesMois' ).offset().left + " ----- "+maxSlide);
    }
   } else {return false; }
        
});// fin click next   
////////////////////////////////////////////////////
}//fin pour les mois
}// fin fonction

slider ();


////////////////////    
}); /// fin getJson
//////////////////// 


 


});//fin document ready

</script>

<div id="cercle"></div>

<div id="trame"></div> 
<div id="oeuvres"></div>
<div id="expos"></div>
<div id="videos"></div>


<div id="prev"></div>
<div id="next"></div>
    
<div id="timelineToolT">
<ul id="tooltips"></ul>
</div>

<div id="retour"><img src="../img/icons/retour.png" id="iconRetour" /></div>
<div id="temps"><ul id="evenements"></ul></div>
<div id="timeline">
<ul id="annees"></ul>
<ul id="anneesMois"></ul>
</div>

