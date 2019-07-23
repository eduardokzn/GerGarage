 /*************************************************************************
  * turtles.js a set of javascript utilities
  *
  *************************************************************************/

 /*.........................................................................
  * get the name of the current page
  *.......................................................................*/
function getCurrentPage()
{
	var path = window.location.pathname;
	var page = path.substring(path.lastIndexOf('/') + 1);
	return page;
}

/*.........................................................................
  * get the name of the current page - alternative
  * ref: http://css-tricks.com/snippets/javascript/current-page-with-javascript/
  *.......................................................................*/
function showCurrentPage()
{
	var page =  location.href.split('/').pop();
	return page;
}

 /*.........................................................................
  * get the path and name of the current page
  *.......................................................................*/
function getPageLocation()
{
	var path = window.location.pathname;
	return path;
}

 /*.........................................................................
  * check if javascript libries are loaded
  *.......................................................................*/
function checkLibsLoaded()
{
	if (typeof jQuery == 'undefined') {
	
	    // jQuery IS NOT loaded, do stuff here.
	
	}
}

/*.........................................................................
  * render time
  *.......................................................................*/
//show time, put into element with ID="clockDisplay"
function renderTime()
{
	var currentTime = new Date();
	var diem = "AM";
	var h = currentTime.getHours();
	var m = currentTime.getMinutes();
	var s = currentTime.getSeconds();
	if(h == 0){
		h=12;	
	}	else if(h>12) {
		h=h-12;
		diem = "PM";
		}
	if(m < 10) {
		m = "0" + m;
	}
	if(s < 10) {
		s = "0" + s;
	}
	var myClock = document.getElementById('clockDisplay');
	myClock.textContent = h + ":" + m + ":" + s + " " + diem;
	setTimeout('renderTime()',1000);
}