/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

	////////// get json des references ///////////////////////////
$.getJSON(json_file,function(result){
    console.log(json_file);
    $.each(result.references, function(i, field){     
            

            myBar.addImage(chemin_bg+field.bg);
            myBar.addImage(chemin_slides+field.img);

      
    });
          });
///////////////////////////////////////////////////////////////////////////////
      
var LoadBar = function(){
	this.value = 0;
	this.sources = Array();
	this.sourcesDB = Array();
	this.totalFiles = 0;
	this.loadedFiles = 0;
        this.images = Array();
	this.imagesDB = Array();
	this.loadedImages = Array(); /* Stores all Image()-Objects */
	
	/* Settings */
	this.imgPath = "";
        
};



//Show the loading bar interface
LoadBar.prototype.show = function() {
	this.locate();
	document.getElementById("loadingZone").style.display = "block";
};


//Hide the loading bar interface
LoadBar.prototype.hide = function() {
     
     
        $('#infoLoading').fadeOut(function () {
         $('#loadingSms').fadeOut(function  () {
             $('#trame2').fadeOut(600);
             $('#bgLoading').fadeOut(1000, function () { $('#loadingZone').fadeOut(600); $('#all').fadeIn();});
         }); 
        });
            
};
 



//Add all scripts to the DOM
LoadBar.prototype.run = function(){
	this.show();
	var i;
	for (i=0; i<this.sourcesDB.length; i++){
		var source = this.sourcesDB[i];
		var head = document.getElementsByTagName("head")[0];
		var script = document.createElement("script");
		script.type = "text/javascript";
		script.src = source;
		head.appendChild(script);
	}
        
        /* Added support for loading Images in a similar way like the script above */
	var j;
	for (j=0; j<this.imagesDB.length; j++){  
        var source = this.imagesDB[j];
		this.loadedImages[source] = new Image();
		this.loadedImages[source].src = this.imgPath + source;
		eval('$(this.loadedImages[source]).load(function() {myBar.loadedImage("'+source.toString()+'");});');
    }
    
    
};
//Center in the screen remember it from old tutorials? ;)
LoadBar.prototype.locate = function(){
	var loadingZone = document.getElementById("loadingZone");
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var popupHeight = loadingZone.clientHeight;
	var popupWidth = loadingZone.clientWidth;
	
};
//Set the value position of the bar (Only 0-100 values are allowed)
LoadBar.prototype.setValue = function(value){
	if(value >= 0 && value <= 100){
//		document.getElementById("progressBar").style.width = value + "%";
		/*document.getElementById("infoProgress").innerHTML = parseInt(value) + "%";*/
	}
};





//Set the bottom text value
LoadBar.prototype.setAction = function(action){
	document.getElementById("infoLoading").innerHTML = action;
};
//Add the specified script to the list
LoadBar.prototype.addScript = function(source){
	this.totalFiles++;
	this.sources[source] = source;
	this.sourcesDB.push(source);
};

LoadBar.prototype.addImage = function(source){
	this.totalFiles++;
    this.images[source] = source;  
    this.imagesDB.push(source);
}

//Called when an image is loaded. Increment the progress value and check if all files are loaded  
LoadBar.prototype.loadedImage = function(file) {  
    this.loadedFiles++;  
	delete this.images[file];  
    var pc = (this.loadedFiles * 100) / this.totalFiles;  
    this.setValue(pc);  
    this.setAction("Chargement des images : "+this.loadedFiles+" sur "+this.totalFiles);  
    //Are all files loaded?  
    if(this.loadedFiles == this.totalFiles){  
        setTimeout("myBar.hide()",0);
        //document.getElementById("loader").style.display = "block";  
    }  
	
	// Show Background-image as soon as it is loaded
	/*if(file == "background.jpg"){
		$('body').css('background-image','url(img/background.jpg)');
		$("#overlay").fadeOut(500);
	}*/
}; 

//Called when a script is loaded. Increment the progress value and check if all files are loaded
LoadBar.prototype.loaded = function(file) {
	this.loadedFiles++;
	delete this.sources[file];
	var pc = (this.loadedFiles * 100) / this.totalFiles;
	this.setValue(pc);
	this.setAction("Chargement des scripts");
	//Are all files loaded?
	if(this.loadedFiles == this.totalFiles){
		setTimeout("myBar.hide()",0);
                
		//load the reset button to try one more time!
		//document.getElementById("loader").style.display = "block";
	}
};
//Global var to reference from other scripts
var myBar = new LoadBar();

//Checking resize window to recenter :)
window.onresize = function(){
	myBar.locate();
};
//Called on body load
start = function(){
           

    
	myBar.run();
};
//Called on click reset button
loader = function(){
	window.location.reload();
};