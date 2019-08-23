/*************************************************************************
* 
* @author DEV
* 
* Ref:
*
*************************************************************************/

/*
.......................................................................
*
* attach a click function to each of the browse 'more' anchors
.......................................................................*/

$(document).ready(function(){
	
	$('#dbtable td.crud a.review').click(function (e){

			loadItem(this.hash);
			console.log(this.hash);
			
	});
	
});


/*
.........................................................................
* Example use of an AJAX request to get a record from a database
*.......................................................................*/

function loadItem(anID)
{
    var xmlhttp;
    
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
    
    xmlhttp.onreadystatechange=processXHRreturn;
    
    //GET THE PAGE
  	var url="bookingList.php";
    
	url=url+"?iid="+anID.replace('#','');
	url=url+"&r="+Math.random();
	
	console.log(url);

    xmlhttp.open("GET",url,true);
    xmlhttp.send(null);
    
    //The xmlhttp.onreadystatechange EVENT will be triggered when a response comes back
    //The anonomyous function we associated with the event is then triggered
        console.log(xmlhttp.responseText);
	function processXHRreturn()
	{
		if (xmlhttp.readyState===4 && xmlhttp.status===200)
	    {
            document.getElementById("BookingList").innerHTML="<p>"+xmlhttp.responseText+" </p>";
	   
	    }   
	}

}
