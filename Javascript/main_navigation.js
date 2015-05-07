jQuery(document).ready(function() {
	
	jQuery('#personajes_wrapper').fadeIn('slow');


	if(sPath == "/disneychannel/" || sPath == "/disneychannel/index.html"){
			
			jQuery('#homeButton').css("cursor", "default");
		
	}
    	
	if (jQuery.browser.msie && jQuery.browser.version == "7.0") 
	{
	
			jQuery('#mycarousel').jcarousel({
			wrap: null,
			animation:'fast',
			visible:6,
			scroll:1

			});
		
	}else{
		
		jQuery('#mycarousel').jcarousel({
			wrap:'circular',
			animation:'fast',
			visible:6,
			scroll:1

		});
	
	}

	if(site == 'microsite' && site != 'home'){
		var liCount = 1;
		var aCount = 1;
		jQuery( "div#text_buttons_wrapper ul li" ).each(function() {
			jQuery('#text_menu_'+liCount).css("background-image","url(http://"+entorno+".disneylatino.com/disneychannel/images/botonera/text_button_"+liCount+".png)");
			liCount++
		});
		jQuery( "ul#mycarousel.jcarousel-list li.jcarousel-item a" ).each(function() {
			jQuery('#botonera #btn-'+aCount).css("background-image","url(http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-"+aCount+"_"+site+".png)");
			aCount++;
		});
	}

	jQuery('#homeButton').bind('click', function(e) {
	
		if(sPath == "/disneychannel/" || sPath == "/disneychannel/index.html"){
		
		
		}else{

			window.location = "http://"+entorno+".disneylatino.com/disneychannel/";

		}

	});
	
});

	

//PICK UP URL
var sPath = window.location.pathname;

var urlEntorno = window.location.host.split( '.' );
var entorno = urlEntorno.shift();
if(entorno == 'disneylatino' || entorno == 'cuandotocalacampana'){entorno = 'www';}


//SET VARIABLES
var site = "home";

var someStyleHome = " ";
var hRefHome = "http://"+entorno+".disneylatino.com/disneychannel/";

var someStyleProg = " ";
var hRefProg = "http://"+entorno+".disneylatino.com/disneychannel/programacion/";

var someStyleVota = " ";
var hRefVota = "http://"+entorno+".disneylatino.com/disneychannel/votacion/";

var someStyleSeries = " ";
var hRefSeries = "http://"+entorno+".disneylatino.com/disneychannel/series/";

var someStylePelis = " ";
var hRefPelis = "http://"+entorno+".disneylatino.com/disneychannel/peliculas_originales/";

var backgroundPositionOver = "0px -76px";



//CHECK WHERE YOU´RE AT!!!
if(sPath == "/disneychannel/" || sPath == "/disneychannel/index.html"){
	
	someStyleHome ="style='background-position: 0px -19px; cursor:auto;'";
	hRefHome= "#";

}else if(sPath == "/disneychannel/series/s/index.html"
|| sPath == "/disneychannel/series/n/index.html"
|| sPath == "/disneychannel/series/p/index.html"
|| sPath == "/disneychannel/series/c/index.html"
|| sPath == "/disneychannel/series/s/"
|| sPath == "/disneychannel/series/n/"
|| sPath == "/disneychannel/series/p/"
|| sPath == "/disneychannel/series/c/"
){

	someStyleSeries ="style='background-position: 0px -19px; cursor:auto;'";
	hRefSeries = "#";

}else if(sPath == "/disneychannel/votacion/s/index.html"
|| sPath == "/disneychannel/votacion/n/index.html"
|| sPath == "/disneychannel/votacion/p/index.html"
|| sPath == "/disneychannel/votacion/c/index.html"
|| sPath == "/disneychannel/votacion/s/"
|| sPath == "/disneychannel/votacion/n/"
|| sPath == "/disneychannel/votacion/p/"
|| sPath == "/disneychannel/votacion/c/"

){
	
	someStyleVota ="style='background-position: 0px -19px; cursor:auto;'";
	hRefVota = "#";

}else if(sPath == "/disneychannel/programacion/s/index.html" 
|| sPath == "/disneychannel/programacion/n/index.html"
|| sPath == "/disneychannel/programacion/p/index.html"
|| sPath == "/disneychannel/programacion/c/index.html"
|| sPath == "/disneychannel/programacion/s/"
|| sPath == "/disneychannel/programacion/n/"
|| sPath == "/disneychannel/programacion/p/"
|| sPath == "/disneychannel/programacion/c/"
){
	
	someStyleProg ="style='background-position: 0px -19px; cursor:auto;'";
	hRefProg = "#";

}else if(sPath == "/disneychannel/peliculas_originales/s/index.html"
|| sPath == "/disneychannel/peliculas_originales/n/index.html"
|| sPath == "/disneychannel/peliculas_originales/p/index.html"
|| sPath == "/disneychannel/peliculas_originales/c/index.html"
|| sPath == "/disneychannel/peliculas_originales/s/"
|| sPath == "/disneychannel/peliculas_originales/n/"
|| sPath == "/disneychannel/peliculas_originales/p/"
|| sPath == "/disneychannel/peliculas_originales/c/"
){

	someStylePelis ="style='background-position: 0px -19px; cursor:auto;'";
	hRefPelis = "#";

}else{

	site= "microsite";
	backgroundPositionOver = "0px -62px";

}

var params = [];
if(site != 'microsite' && site == 'home'){
	
	var param12 = "&ex_cmp=dchp_BTP12";
	
	for(var i = 1; i < 12; i++){
		params.push("?ex_cmp=dchp_BTP"+i);
	}
}else{
	
	var param12 = "";
	
	for(var i = 1; i < 12; i++){
		params.push("");
	}
}



/****************************************/
/***	  HOVER MAIN NAVIGATION		 ***/	
/**************************************/

function botoneraOpacarPersonajes( sinOpacar ){
    var i;
    if ( parseInt(sinOpacar) > 0 ){
       
        for(i=1; i <= 12; i++ ){
            if ( parseInt(sinOpacar) != i ){
			
					jQuery('#botonera #btn-'+i).css("background-position", backgroundPositionOver);
				
				}else{
					
					jQuery('#botonera #btn-'+i).css("background-image","url(http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-"+i+"-logo_"+site+".png)");
 
				}
        }
    }else{
        for(i=1; i <= 12; i++ ){
		
			jQuery('#botonera #btn-'+i).css("background-image","url(http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-"+i+"_"+site+".png)");
			jQuery('#botonera #btn-'+i).css("background-position","0px 0px");
               
        }
    }
}


document.write("<link href='http://"+entorno+".disneylatino.com/disneychannel/css/botonera_styles_"+site+".css' rel='stylesheet' type='text/css' />");
document.write("<script type='text/javascript' src='http://www.disneylatino.com/disneychannel/js/lib/jquery.jcarousel.min.js'></script>");

document.write(" <div id='botonera'>");
document.write("    <div id='homeButton'>&nbsp;</div>");
document.write(" 	<ul id='mycarousel' class='jcarousel-skin-tango'>");

document.write("			<li><a id='btn-1' href='http://"+entorno+".disneylatino.com/disneychannel/series/stanelperrobloguero/"+params[0]+"' onMouseOver='botoneraOpacarPersonajes(1)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-1-logo_"+site+".png' alt='Stanel Perro Bloguero' /></a></li>");

document.write("			<li><a id='btn-2' href='http://"+entorno+".disneylatino.com/disneychannel/series/gravityfalls/"+params[1]+"' onMouseOver='botoneraOpacarPersonajes(2)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-2-logo_"+site+".png' alt='Gravity Falls' /></a></li>");

document.write("			<li><a id='btn-3' href='http://"+entorno+".disneylatino.com/disneychannel/phineasyferb/"+params[2]+"' onMouseOver='botoneraOpacarPersonajes(3)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-3-logo_"+site+".png' alt='Phineas y Ferb' /></a></li>");

document.write("			<li><a id='btn-4' href='http://"+entorno+".disneylatino.com/disneychannel/series/violetta/"+params[3]+"' onMouseOver='botoneraOpacarPersonajes(4)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-4-logo_"+site+".png' alt='Violetta' /></a></li>");

document.write("			<li><a id='btn-5' href='http://"+entorno+".disneylatino.com/disneychannel/series/austinyally/"+params[4]+"' onMouseOver='botoneraOpacarPersonajes(5)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-5-logo_"+site+".png' alt='Austin y Ally' /></a></li>");

document.write("			<li><a id='btn-6' href='http://"+entorno+".disneylatino.com/disneychannel/series/jessie/"+params[5]+"' onMouseOver='botoneraOpacarPersonajes(6)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-6-logo_"+site+".png' alt='JESSIE' /></a></li>");

document.write("			<li><a id='btn-7' href='http://"+entorno+".disneylatino.com/disneychannel/series/atodoritmo/"+params[6]+"' onMouseOver='botoneraOpacarPersonajes(7)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-7-logo_"+site+".png' alt='A Todo Ritmo' /></a></li>");

document.write("			<li><a id='btn-8' href='http://"+entorno+".disneylatino.com/disneychannel/series/programadetalentos/antfarm/"+params[7]+"' onMouseOver='botoneraOpacarPersonajes(8)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-8-logo_"+site+".png' alt='Programa de Talentos' /></a></li>");

document.write("			<li><a id='btn-9' href='http://"+entorno+".disneylatino.com/disneychannel/series/buenasuertecharlie/"+params[8]+"' onMouseOver='botoneraOpacarPersonajes(9)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-9-logo_"+site+".png' alt='Â¡Buena Suerte, Charlie!' /></a></li>");

document.write("			<li><a id='btn-10' href='http://"+entorno+".disneylatino.com/disneychannel/series/pecezuelos/"+params[9]+"' onMouseOver='botoneraOpacarPersonajes(10)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-10-logo_"+site+".png' alt='Pecezuelos' /></a></li>");

document.write("			<li><a id='btn-11' href='http://"+entorno+".disneylatino.com/disneychannel/series/wizardsofwaverlyplace/"+params[10]+"' onMouseOver='botoneraOpacarPersonajes(11)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-11-logo_"+site+".png' alt='Los Hechiceros de Waverly Place' /></a></li>");

document.write("			<li><a id='btn-12' href='http://"+entorno+".disneylatino.com/es/videos/dc/activo/index.jsp?videoId=3952"+param12+"' onMouseOver='botoneraOpacarPersonajes(12)' onMouseOut='botoneraOpacarPersonajes(-1)'><img src='http://"+entorno+".disneylatino.com/disneychannel/images/botonera/btn-12-logo_"+site+".png' alt='Umix' /></a></li>");

document.write(" </ul>");

document.write("	</div>");

document.write("		<div id='text_buttons_wrapper'>");

document.write("			<ul>");

document.write("				<li><a id='text_menu_5' href='"+hRefPelis+"'"+someStylePelis+"></a></li>");			
document.write("				<li><a id='text_menu_4' href='"+hRefSeries+"'"+someStyleSeries+"></a></li>");			
document.write("				<li><a id='text_menu_3' href='"+hRefVota+"'"+someStyleVota+"></a></li>");			
document.write("				<li><a id='text_menu_2' href='"+hRefProg+"'"+someStyleProg+"></a></li>");			
document.write("				<li><a id='text_menu_1' href='"+hRefHome+"'"+someStyleHome+" ></a></li>");		

document.write("			</ul>");

document.write("		</div>");