///////////////////////////////////////////////////////
// Use JSONP to avoid "same domain policy" errors. 
///////////////////////////////////////////////////////

// Define the function that receives the JSON object 
function dataHandler(data) {
    
	var output='';
	
    // Loop through the array in data object
    for (var i = 0; i <= data.links.length-1; i++) {
		
        // Give each object a key as if it were a FOR IN loop
        for (key in data.links[i]) {
			
            //Verify that no other properties have been added to these objects 
            if (data.links[i].hasOwnProperty(key)) {
				
                // Add all the list items to the output variable
				output += '<li>' + '<a href = "' + data.links[i][key] + '">' + key + '</a></li>';
            }
            
		}
        
	}

    // Get <ol> element from the HTML and pass the list items 
	var myList = document.getElementById('links');
	myList.innerHTML = output;

}


///////////////////////////////////////////////////////
// The JSON file located in another server should 
// look like this:
///////////////////////////////////////////////////////

// Pass the JSON object as a function parameter
dataHandler({
	"full_name" : "Federico Venturino",
	"class" : "JavaScript & JSON",
	"links" : [
			{ "blog"     : "http://someblog.com" },
			{ "facebook" : "http://facebook.com" },
			{ "podcast"  : "http://feeds.feedburner.com/authoredcontent" },
			{ "twitter"  : "http://twitter.com" },
			{ "youtube"  : "http://www.youtube.com" }
		]
});