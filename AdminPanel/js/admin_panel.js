function Logout(){
	if (window.XMLHttpRequest) {
		http = new XMLHttpRequest();
		http.onreadystatechange = LogoutResponse;
		http.open("GET", "ax_logout.php?rand=" + Math.random() ,true);
		http.send(null);
	} else if (window.ActiveXObject) {
		http = new ActiveXObject("Microsoft.XMLHTTP");
		if (http) {
			http.onreadystatechange = LogoutResponse;
			http.open("GET", "ax_logout.php?rand=" + Math.random() ,true);
			http.send(null);
		}
	}
}

function LogoutResponse(){
	var strRes; 
		if (http.readyState == 4 && http.status == 200) { 
			strRes=http.responseText;
			document.location.href="Log-in.php";
		}
}




// RETURN FIRST AND LAST DATE OF A PERIOD
function getDatePeriod(period){
	var today = new Date; 
	var date_from;
	var date_to;
	
	switch(period){
		case "today" :
			var firstday = today;
			var lastday  = today;
			break;
		case "week"  :
			var first = today.getDate() - today.getDay() + 1; // First day is the day of the month - the day of the week +1 becouse we start from monday
			var last = first + 6; // last day is the first day + 6

			var firstday = new Date(today.setDate(first));
			var lastday = new Date(today.setDate(last));
			
			break;
		case "month" :
			var firstday = new Date(today.getFullYear(), today.getMonth(), 1); 
			var lastday = new Date(today.getFullYear(), today.getMonth() + 1, 0);
			break;
		case "year"  :
			var firstday = new Date(today.getFullYear()+"-01-01");
			var lastday  = new Date(today.getFullYear()+"-12-31");
			break;
		case "ever"  :
			var firstday = new Date('1970-01-01');
			var lastday  = today;
			break;
	}
	
	date_from = dateToMysqlFormat(firstday);
	date_to   = dateToMysqlFormat(lastday);
	
	return new Array(date_from,date_to);
}


//THIS FIX TEXTAREA PROBLEM (WITHOUT THIS TEXTAREAS WITH SPECIFIC HEIGHT CAUSE's WITE SPACE PROBLEM AT END OF PAGE)
$(window).load(function() {
    setTimeout(function() {
        $.AdminLTE.layout.fix();
        $.AdminLTE.layout.fixSidebar();
    }, 350);
});