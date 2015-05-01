
trace("GALLERY");

//--------------------------------------
// SHOW INSTRUCTIONS IF FIRST VISIT
//--------------------------------------

function displayIntructions():void
{
		
	if(_intructions == false && _gallery != "digital")
	{
		
		trace("Show instructions!");
		
		//Blur background
		esc_mc.visible = true;
		formBackground_mc.visible = true;
		formBackground_mc.alpha = 0;
		TweenLite.to(formBackground_mc, 2, {alpha:0.5, ease:Quart.easeOut});
		TweenMax.to(title_mc, 2, {blurFilter:{blurX:3, blurY:3}});
		TweenMax.to(footer_mc, 2, {blurFilter:{blurX:3, blurY:3}});
		TweenMax.to(arrows_mc, 2, {blurFilter:{blurX:3, blurY:3}});
		TweenMax.to(backButton_btn, 2, {blurFilter:{blurX:3, blurY:3}});
		
		instructions_mc.visible = true;
		instructions_mc.alpha = 0;
		TweenLite.to(instructions_mc, 1, {alpha:1, ease:Quart.easeIn});
		
		instructions_mc.exitBtn_btn.addEventListener(MouseEvent.CLICK, exitIntructions);
		esc_mc.addEventListener(MouseEvent.CLICK, exitIntructions);
		
		_intructions = true;
		
	}

}

function exitIntructions(event:MouseEvent):void
{
	
	instructions_mc.exitBtn_btn.removeEventListener(MouseEvent.CLICK, exitIntructions);
	esc_mc.removeEventListener(MouseEvent.CLICK, exitIntructions);
	
	//Blur gone
	TweenMax.to(title_mc, 2, {blurFilter:{blurX:0, blurY:0}});
	TweenMax.to(footer_mc, 2, {blurFilter:{blurX:0, blurY:0}});
	TweenMax.to(arrows_mc, 2, {blurFilter:{blurX:0, blurY:0}});
	TweenMax.to(backButton_btn, 2, {blurFilter:{blurX:0, blurY:0}});
	TweenLite.to(instructions_mc, 1, {alpha:0, ease:Quart.easeOut, onComplete:removeInstructions});
	TweenMax.to(formBackground_mc, 2, {alpha:0, ease:Quart.easeOut, onComplete:removeFormBackground});
	
	function removeInstructions():void
	{
		
		instructions_mc.visible = false;
			
	}
	
	function removeFormBackground():void
	{
		
		esc_mc.visible = false;
		formBackground_mc.visible = false;
			
	}
	
}



//--------------------------------------
// MAKE EVERYTHING FADE IN
//--------------------------------------

function showGalleryIcons():void
{
	
	footer_mc.visible = true;
	title_mc.visible = true;
	arrows_mc.visible = true;
	backButton_btn.visible = true;
	thumbsContainer_mc.visible = true;
	
	footer_mc.alpha = 0;
	title_mc.alpha = 0;
	arrows_mc.alpha = 0;
	backButton_btn.alpha = 0;
	thumbsContainer_mc.alpha = 0;
	
	TweenLite.to(footer_mc, 1, {alpha:1, ease:Quart.easeIn});
	TweenLite.to(title_mc, 1, {alpha:1, ease:Quart.easeIn, onComplete:displayIntructions});
	TweenLite.to(arrows_mc, 1, {alpha:1, ease:Quart.easeIn});
	TweenLite.to(backButton_btn, 1, {alpha:1, ease:Quart.easeIn});
	
	toggleThumbs = false;

}




//-----------------------------------------------------------------------
// populate the horizontal scroller with content derived from an XML file
//-----------------------------------------------------------------------



var menuXmlLoader:LoadXml = new LoadXml("images/"+_gallery+"/images.xml");
menuXmlLoader.addEventListener(Event.COMPLETE, menuXMLLoaded);

var thumbXML:XML;
var loader:Loader;
var p:int = 0;


function menuXMLLoaded(event:Event):void 
{
	
	trace("xml loaded");
	menuXmlLoader.removeEventListener(Event.COMPLETE, menuXMLLoaded);
	thumbXML = menuXmlLoader.loadedXML;
	
}

function loadThumb():void 
{

	loader = new Loader();
	loader.contentLoaderInfo.addEventListener(Event.COMPLETE, initListener);
	loader.load(new URLRequest(String(thumbXML.pic.thumb.text()[p])));
	
}

function initListener(event:Event):void 
{
	
	thumbsContainer.addContentItem(loader.content);
	p++;
	
	if (p < thumbXML.pic.length ()) {
		loadThumb();//create loop
	}
	
	if (p == thumbXML.pic.length ()) {
		
		//DO WHEN FINISHED LOADING
		
		//Enable the panels scrolling when all the content has loaded in
		thumbsContainer.enableScrolling();
		
		gotoAndStop(21);
		
	}
}





//--------------------------------------
// TOGGLE PRELOADER AS CURSOR
//--------------------------------------

var preloading  = true;

function toggleLoader():void
{
	
	if(preloading==true)
	{
		
		Mouse.hide();
		preloader_mc.startDrag(true);
		preloader_mc.visible = true;
		
		preloading = false;
		
	}else{
		
		Mouse.show();
		preloader_mc.stopDrag();
		preloader_mc.visible = false;
		
		preloading  = true;
		
	}
	
}





//--------------------------------------
// MAIN PHOTOS
//--------------------------------------

var imageSize:String;

if(stage.stageWidth<1280){
	
	imageSize = "1024";
	
	
}else if(stage.stageWidth<1680){
	
	imageSize = "1440";
	

}else{
	
	imageSize = "1900";
	
}

myLoader.load(new URLRequest("images/"+_gallery+"/"+imageSize+"/"+_bottomPhoto+".jpg"));
myLoader.contentLoaderInfo.addEventListener(ProgressEvent.PROGRESS, showPercentageLoaded);
myLoader.contentLoaderInfo.addEventListener(Event.COMPLETE, loadCompleteHandler);


function showPercentageLoaded(event:ProgressEvent):void
{
	
	preloaderContainer_mc.visible = true;
	var load:Number = event.target.bytesLoaded;
	var total:Number = event.target.bytesTotal;
	var percent:Number = load/total;
	preloaderContainer_mc.newPreloader.text = (Math.round(percent * 100)) + "%";
	
}





//--------------------------------------
// PRELOADER
//--------------------------------------

function loadCompleteHandler(event:Event):void
{
	
	trace("Done!");
	
	preloaderContainer_mc.newPreloader.text = "";
	preloaderContainer_mc.visible = false;
	
	myLoader.contentLoaderInfo.removeEventListener(Event.COMPLETE, loadCompleteHandler);
	myLoader.contentLoaderInfo.removeEventListener(ProgressEvent.PROGRESS, showPercentageLoaded);

	fotoSuperior_mc.addChild(myLoader);
	
	//Center To Stage
	onResize(); 
	
	myTransitionManagerTop.startTransition({type:Fade, direction:Transition.IN, duration:3, easing:Regular.easeIn});
	myTransitionManagerTop.addEventListener("allTransitionsInDone", loadThumbs);
	
	
	function loadThumbs(evt:Event):void
	{
		
		myTransitionManagerTop.removeEventListener("allTransitionsInDone", loadThumbs);
		showGalleryIcons();
		loadThumb();
		
	}
	
}



//--------------------------------------
// HIDE / SHOW THUMBNAILS CONTAINER
//--------------------------------------

footer_mc.thumbsButton_mc.buttonMode = true;
footer_mc.thumbsButton_mc.addEventListener(MouseEvent.CLICK, toggleThumbsContainer); 

function toggleThumbsContainer(event:MouseEvent):void
{
	
	if(toggleThumbs == false)
	{ 
		
		thumbsContainer_mc.visible = true;
		thumbsContainer_mc.alpha = 0;
		TweenLite.to(thumbsContainer_mc, 1, {alpha:1, ease:Quart.easeIn});
	
		TweenLite.to(arrows_mc, 1, {alpha:0, ease:Quart.easeIn, onComplete:invisibleArrows});
		
		toggleThumbs = true;
		
	}else{
		
		arrows_mc.visible = true;
		TweenLite.to(thumbsContainer_mc, 1, {alpha:0, ease:Quart.easeOut});	
		TweenLite.to(arrows_mc, 1, {alpha:1, ease:Quart.easeIn});
	
		toggleThumbs = false;
		
		
	}
	
}

function invisibleArrows():void
{

	arrows_mc.visible = false;

}
