
/*.........................................................................
* Example use of an AJAX request to replace an element in the DOM
* with what has been returned from the AJAX request
*.......................................................................*/
function loadXMLDoc()
{
    var xmlhttp;
    
    console.log("got here AJAX"); 
    
    //Get a XHR object
    try
    {
	    if (window.XMLHttpRequest)
	        {// code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp=new XMLHttpRequest();
	        }
	    else
	        {// code for IE6, IE5
	            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	        }
    }
    catch(e)
    {
    	console.log("XHR creation issue");
    }
    
	//this function is called when there is a xmlhttp.onreadystatechange EVENT
    
    //WATCHER
    xmlhttp.onreadystatechange=function()
  	{
	    if (xmlhttp.readyState==4 && xmlhttp.status==200 )
	        {
	           document.getElementById("AJAXResponseMessage").innerHTML="<p>"+ xmlhttp.responseText+"</p>";
	        }
  	};
  	
  	//REQUESTER
    xmlhttp.open("GET","ajaxComments.txt",true);
    xmlhttp.send();
    
    //The xmlhttp.onreadystatechange EVENT will be triggered when a response comesback
    //The anonomyous function we associated with the event is then triggered
    
    //ONCE RESPONCE THE WATCHER IS CALLED
	
}

