trace("HOME");

//-------------------------------------------------
// SET STAGE
//-------------------------------------------------


navigationBar_mc.visible = true;
Title_Home_mc.visible = true;
homeFullscreen_mc.visible = true;
navigationBar_mc.alpha = 0;
Title_Home_mc.alpha = 0;


TweenLite.to(Title_Home_mc, 1, {alpha:1, ease:Quart.easeIn});
TweenLite.to(navigationBar_mc, 1, {alpha:1, ease:Quart.easeIn});


footer_mc.visible = false;
title_mc.visible = false;


homeFullscreen_mc.addEventListener(MouseEvent.CLICK, toggleFullScreen);


//-------------------------------------------------
//IF CONTAINERS HAVE A GALLERY LOADED, REMOVE CHILD
//-------------------------------------------------

if(flag==1)
{
	trace("Remove top child");
	flag=0;
	fotoSuperior_mc.removeChild(myLoader);
	
}else if(flag==2){
	
	trace("Remove bottom child");
	flag=0;
	fotoInferior_mc.removeChild(myLoader2);
	
}



//--------------------------------------
//NAVIGATION BUTTONS
//--------------------------------------


navigationBar_mc.blackAndWhite_mc.infrared.addEventListener(MouseEvent.CLICK, gotoGallery);
navigationBar_mc.blackAndWhite_mc.infrared.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
navigationBar_mc.blackAndWhite_mc.infrared.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);

navigationBar_mc.blackAndWhite_mc.street.addEventListener(MouseEvent.CLICK, gotoGallery);
navigationBar_mc.blackAndWhite_mc.street.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
navigationBar_mc.blackAndWhite_mc.street.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);

navigationBar_mc.blackAndWhite_mc.concerts.addEventListener(MouseEvent.CLICK, gotoGallery);
navigationBar_mc.blackAndWhite_mc.concerts.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
navigationBar_mc.blackAndWhite_mc.concerts.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);

navigationBar_mc.nature_mc.animals.addEventListener(MouseEvent.CLICK, gotoGallery);	
navigationBar_mc.nature_mc.animals.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
navigationBar_mc.nature_mc.animals.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);

navigationBar_mc.nature_mc.landscape.addEventListener(MouseEvent.CLICK, gotoGallery);	
navigationBar_mc.nature_mc.landscape.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
navigationBar_mc.nature_mc.landscape.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);

navigationBar_mc.nature_mc.plants.addEventListener(MouseEvent.CLICK, gotoGallery);	
navigationBar_mc.nature_mc.plants.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
navigationBar_mc.nature_mc.plants.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);

navigationBar_mc.fashion_mc.portfolio.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
navigationBar_mc.fashion_mc.portfolio.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);

navigationBar_mc.fashion_mc.fashionWeek.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
navigationBar_mc.fashion_mc.fashionWeek.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);

navigationBar_mc.nudes_mc.digital.addEventListener(MouseEvent.CLICK, gotoGallery);	
navigationBar_mc.nudes_mc.digital.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
navigationBar_mc.nudes_mc.digital.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);

navigationBar_mc.nudes_mc.nudes.addEventListener(MouseEvent.CLICK, callForm);
navigationBar_mc.nudes_mc.nudes.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
navigationBar_mc.nudes_mc.nudes.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);

navigationBar_mc.contact_mc.contact.addEventListener(MouseEvent.CLICK, callContactForm);
navigationBar_mc.contact_mc.flickr_mc.addEventListener(MouseEvent.CLICK, callFlickr);

				
	
	


//--------------------------------------
//FUNCTIONS
//--------------------------------------


function handleMouseOver(event:MouseEvent):void
{
	
	switch(event.target.name)
	{
		
		/*	B&W	*/
		case "street" : TweenLite.to(navigationBar_mc.blackAndWhite_mc.street, 1, {tint:0x840000});
						break;
						
		case "infrared" : TweenLite.to(navigationBar_mc.blackAndWhite_mc.infrared, 1, {tint:0x840000});
							break;
							
		case "concerts" : TweenLite.to(navigationBar_mc.blackAndWhite_mc.concerts, 1, {tint:0x840000});
							break;
							
							
		/*	NATURE	*/
		case "animals" : TweenLite.to(navigationBar_mc.nature_mc.animals, 1, {tint:0x840000});
							break;		
							
		case "landscape" : TweenLite.to(navigationBar_mc.nature_mc.landscape, 1, {tint:0x840000});
							break;
							
		case "plants" : TweenLite.to(navigationBar_mc.nature_mc.plants, 1, {tint:0x840000});
							break;	
							
		/*	FASHION	*/
		case "portfolio" : TweenLite.to(navigationBar_mc.fashion_mc.portfolio, 1, {tint:0x840000});
							break;		
							
		case "fashionWeek" : TweenLite.to(navigationBar_mc.fashion_mc.fashionWeek, 1, {tint:0x840000});
							break;
							
						
		/*	NUDES	*/
		case "digital" : TweenLite.to(navigationBar_mc.nudes_mc.digital, 1, {tint:0x840000});
							break;
							
		case "nudes" : TweenLite.to(navigationBar_mc.nudes_mc.nudes, 1, {tint:0x840000});
							break;	
		
	}
  	
}


function handleMouseOut(event:MouseEvent):void
{
	
	switch(event.target.name)
	{
		
		/*	B&W	*/
		case "street" : TweenLite.to(navigationBar_mc.blackAndWhite_mc.street, 1, {tint:0xCCCCCC});
						break;
						
		case "infrared" : TweenLite.to(navigationBar_mc.blackAndWhite_mc.infrared, 1, {tint:0xCCCCCC});
							break;
							
		case "concerts" : TweenLite.to(navigationBar_mc.blackAndWhite_mc.concerts, 1, {tint:0xCCCCCC});
							break;
							
							
		/*	NATURE	*/
		case "animals" : TweenLite.to(navigationBar_mc.nature_mc.animals, 1, {tint:0xCCCCCC});
							break;	
							
		case "landscape" : TweenLite.to(navigationBar_mc.nature_mc.landscape, 1, {tint:0xCCCCCC});
							break;		
							
		case "plants" : TweenLite.to(navigationBar_mc.nature_mc.plants, 1, {tint:0xCCCCCC});
							break;	
							
							
		/*	FASHION	*/
		case "portfolio" : TweenLite.to(navigationBar_mc.fashion_mc.portfolio, 1, {tint:0xCCCCCC});
							break;		
							
		case "fashionWeek" : TweenLite.to(navigationBar_mc.fashion_mc.fashionWeek, 1, {tint:0xCCCCCC});
							break;
							
							
		/*	NUDES	*/
		case "digital" : TweenLite.to(navigationBar_mc.nudes_mc.digital, 1, {tint:0xCCCCCC});
							break;
							
		case "nudes" : TweenLite.to(navigationBar_mc.nudes_mc.nudes, 1, {tint:0xCCCCCC});
							break;
						
	}
	
}


function callFlickr(event:MouseEvent):void
{
	
	var url:String = "http://www.flickr.com/photos/fed_v/";
 	var request:URLRequest = new URLRequest(url);
  	
   	 navigateToURL(request, '_blank');
  	
}

function callContactForm(event:MouseEvent):void
{
	
	stage.displayState = "normal"; 
	contactForm_mc.visible = true;
	contactForm_mc.alpha = 0;
	esc_mc.visible = true;
	formBackground_mc.visible = true;
	formBackground_mc.alpha = 0;
	formBackground_mc.width = stage.stageWidth;
	formBackground_mc.height = stage.stageHeight;
	
	TweenLite.to(formBackground_mc, 2, {alpha:0.5, ease:Quart.easeOut});
	TweenLite.to(contactForm_mc, 2, {alpha:1, ease:Quart.easeOut});
	
	//Blur background
	TweenMax.to(Title_Home_mc, 1, {blurFilter:{blurX:3, blurY:3}});
	TweenMax.to(navigationBar_mc, 1, {blurFilter:{blurX:3, blurY:3}});
	
	//Add listeners to stage
	contactForm_mc.submitContact_mc.buttonMode = true;
	contactForm_mc.submitContact_mc.addEventListener(MouseEvent.CLICK, submitContactForm);
	
	contactForm_mc.exitBtn_btn.addEventListener(MouseEvent.CLICK, exitContactForm);
	esc_mc.addEventListener(MouseEvent.CLICK, exitContactForm);

}

	
function gotoGallery(event:MouseEvent):void
{
	
	//REMOVE ALL LISTENERS
	
	navigationBar_mc.blackAndWhite_mc.infrared.removeEventListener(MouseEvent.CLICK, gotoGallery);
	navigationBar_mc.blackAndWhite_mc.street.removeEventListener(MouseEvent.CLICK, gotoGallery);
	navigationBar_mc.nudes_mc.digital.removeEventListener(MouseEvent.CLICK, callForm);
	navigationBar_mc.nudes_mc.nudes.removeEventListener(MouseEvent.CLICK, gotoGallery);
	navigationBar_mc.nature_mc.landscape.removeEventListener(MouseEvent.CLICK, gotoGallery);	
	
	
	//INIT SPECIFIC GALLERY VARIABLES
	switch (event.target.name)
	{
		
		case "infrared": _totalPhotos = 9;
						 break;
								
		case "street": _totalPhotos = 9;
					   break;
					
		case "concerts": _totalPhotos = 2;
					     break;
							  
		case "digital": _totalPhotos = 9;
						break;
						 
		case "landscape": _totalPhotos = 10;
						  break;
						 
		case "animals": _totalPhotos = 4;
						break;
						 
		case "plants": _totalPhotos = 3;
					   break;
							  
	}
		
	_bottomPhoto = 1;
	_gallery = event.target.name;
	
	homeFullscreen_mc.removeEventListener(MouseEvent.CLICK, toggleFullScreen);
	homeFullscreen_mc.visible = false;
	TweenLite.to(Title_Home_mc, 1, {alpha:0, ease:Quart.easeOut, onComplete:readyForGallery});
	TweenLite.to(navigationBar_mc, 1, {alpha:0, ease:Quart.easeOut, onComplete:readyForGallery});
	
	function readyForGallery()
	{
		
		navigationBar_mc.visible = false;
		Title_Home_mc.visible = false;
		gotoAndStop("GALLERY");
		
	}
	
}



function callForm(event:MouseEvent):void
{
	
	stage.displayState = "normal"; 
	form_mc.visible = true;
	form_mc.alpha = 0;
	esc_mc.visible = true;
	formBackground_mc.visible = true;
	formBackground_mc.alpha = 0;
	formBackground_mc.width = stage.stageWidth;
	formBackground_mc.height = stage.stageHeight;
	
	TweenLite.to(formBackground_mc, 2, {alpha:0.5, ease:Quart.easeOut});
	TweenLite.to(form_mc, 2, {alpha:1, ease:Quart.easeOut});
	
	//Blur background
	TweenMax.to(Title_Home_mc, 1, {blurFilter:{blurX:3, blurY:3}});
	TweenMax.to(navigationBar_mc, 1, {blurFilter:{blurX:3, blurY:3}});
	
	//Add listeners to stage
	form_mc.submit_mc.buttonMode = true;
	form_mc.submit_mc.addEventListener(MouseEvent.CLICK, submit);
	form_mc.exitBtn_btn.addEventListener(MouseEvent.CLICK, exitForm);
	esc_mc.addEventListener(MouseEvent.CLICK, exitForm);
	form_mc.inputField.addEventListener(MouseEvent.CLICK, eraseErrorMessage);

}


function eraseErrorMessage(event:MouseEvent):void
{
	
	form_mc.errorMessage_mc.alpha = 0;
	
}


function submit(event:MouseEvent):void
{
	
	var inputValue:Number = form_mc.inputField.text;
	trace (inputValue);
	
	if(inputValue == 888)
	{
		
		//REMOVE ALL LISTENERS
	
		navigationBar_mc.blackAndWhite_mc.infrared.removeEventListener(MouseEvent.CLICK, gotoGallery);
		navigationBar_mc.blackAndWhite_mc.street.removeEventListener(MouseEvent.CLICK, gotoGallery);
		navigationBar_mc.nudes_mc.digital.removeEventListener(MouseEvent.CLICK, callForm);
		navigationBar_mc.nudes_mc.nudes.removeEventListener(MouseEvent.CLICK, gotoGallery);

		form_mc.inputField.removeEventListener(MouseEvent.CLICK, eraseErrorMessage);	
		form_mc.submit_mc.removeEventListener(MouseEvent.CLICK, submit);
		esc_mc.removeEventListener(MouseEvent.CLICK, exitForm);
		form_mc.exitBtn_btn.removeEventListener(MouseEvent.CLICK, exitForm);
		
		//INIT VARIABLES
		_bottomPhoto = 1;
		_gallery = "nudes";
		_totalPhotos = 6;		
		
		/*FADE EVERYTHING OUT!*/
		form_mc.inputField.text = "";
		form_mc.errorMessage_mc.alpha = 0;
		TweenLite.to(formBackground_mc, 2, {alpha:0, ease:Quart.easeOut});
		TweenMax.to(Title_Home_mc, 2, {blurFilter:{blurX:0, blurY:0}});
		TweenMax.to(navigationBar_mc, 2, {blurFilter:{blurX:0, blurY:0}});
		TweenLite.to(form_mc, 2, {alpha:0, ease:Quart.easeOut, onComplete:readyForGallery});
		TweenLite.to(Title_Home_mc, 2, {alpha:0, ease:Quart.easeOut, onComplete:readyForGallery});
		TweenLite.to(navigationBar_mc, 2, {alpha:0, ease:Quart.easeOut, onComplete:readyForGallery});
		
		homeFullscreen_mc.removeEventListener(MouseEvent.CLICK, toggleFullScreen);
		homeFullscreen_mc.visible = false;
		
		function readyForGallery()
		{
			
			navigationBar_mc.visible = false;
			Title_Home_mc.visible = false;
			form_mc.visible = false;
			formBackground_mc.visible = false;
			esc_mc.visible = false;
			navigationBar_mc.visible = false;
			gotoAndStop("GALLERY");
			
		}
		
		
	}else{
			
		form_mc.errorMessage_mc.alpha = 1;
			
	}
	
}



function submitContactForm(event:MouseEvent):void
{
	
	var urlVars:URLVariables = new URLVariables();
	urlVars.nombre = contactForm_mc.nameField.text;
	urlVars.email = contactForm_mc.emailField.text;
	urlVars.comentario = contactForm_mc.commentField.text;	
		
	// OPTIONS
	var urlRequ:URLRequest = new URLRequest("includes/mail.php");
	urlRequ.method = URLRequestMethod.POST;
	urlRequ.data = urlVars;
			
	// SEND
	var urlLoad:URLLoader = new URLLoader();
	urlLoad.load(urlRequ);
	urlLoad.addEventListener(Event.COMPLETE, onSendComplete);
	
}


function onSendComplete(obj:Event) 
{
 
  	//MAKE THE FORM DISAPPEAR
	contactForm_mc.nameField.text = "";
	contactForm_mc.emailField.text = "";
	contactForm_mc.commentField.text = "";
	contactForm_mc.successMessage_mc.alpha = 1;

}


function exitForm(event:MouseEvent):void
{
	
	trace("Exit form");
	
	//MAKE THE FORM DISAPPEAR
	form_mc.inputField.text = "";
	form_mc.errorMessage_mc.alpha = 0;
	TweenLite.to(form_mc, 2, {alpha:0, ease:Quart.easeOut});
	
	form_mc.inputField.removeEventListener(MouseEvent.CLICK, eraseErrorMessage);	
	form_mc.submit_mc.removeEventListener(MouseEvent.CLICK, submit);
	esc_mc.removeEventListener(MouseEvent.CLICK, exitForm);
	form_mc.exitBtn_btn.removeEventListener(MouseEvent.CLICK, exitForm);
	
	//Blur gone
	TweenMax.to(Title_Home_mc, 2, {blurFilter:{blurX:0, blurY:0}});
	TweenMax.to(navigationBar_mc, 2, {blurFilter:{blurX:0, blurY:0}});
	
	TweenMax.to(formBackground_mc, 2, {alpha:0, ease:Quart.easeOut, onComplete:removeFormBackground});
	
	
	function removeFormBackground():void
	{
		
		form_mc.visible = false;
		formBackground_mc.visible = false;
		esc_mc.visible = false;
			
	}
	

}

function exitContactForm(event:MouseEvent):void
{
	
	
	//MAKE THE FORM DISAPPEAR
	contactForm_mc.nameField.text = "";
	contactForm_mc.emailField.text = "";
	contactForm_mc.commentField.text = "";
	contactForm_mc.successMessage_mc.alpha = 0;
	TweenLite.to(contactForm_mc, 2, {alpha:0, ease:Quart.easeOut});
	
	
	contactForm_mc.exitBtn_btn.removeEventListener(MouseEvent.CLICK, exitContactForm);
	esc_mc.removeEventListener(MouseEvent.CLICK, exitContactForm);
	
	//Blur gone
	TweenMax.to(Title_Home_mc, 2, {blurFilter:{blurX:0, blurY:0}});
	TweenMax.to(navigationBar_mc, 2, {blurFilter:{blurX:0, blurY:0}});
	
	TweenMax.to(formBackground_mc, 2, {alpha:0, ease:Quart.easeOut, onComplete:removeFormBackground});
	
	
	function removeFormBackground():void
	{
		
		contactForm_mc.visible = false;
		formBackground_mc.visible = false;
		esc_mc.visible = false;
			
	}
	

}





