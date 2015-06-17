window.onload = function() {
    $("reservationCancelBtn").onclick=function(){
    	var jid = $("snum");
  		new Ajax.Request("reservcancel.php", {
    		method: "post",
    		parameters: {id : jid},
    		onSuccess: showReservList,
    		onFailure: ajaxFailed,
    		onException: ajaxFailed
    	});

    }
    
};


function showReservList(ajax) {
	$("reservList").innerHTML = "";
	var bookss = ajax.responseXML.getElementsByTagName("book");
	for (var i = 0; i < bookss.length; i++) {
		var title = bookss[i].getElementsByTagName("title")[0].firstChild.nodeValue;
		var author = bookss[i].getElementsByTagName("author")[0].firstChild.nodeValue;
		var year = bookss[i].getElementsByTagName("year")[0].firstChild.nodeValue;
		var li = document.createElement("li");
        li.innerHTML = title + ", by " + author + " (" + year + ")";
        $("books").appendChild(li);
	} 
}

function showBooks_JSON(ajax) {
	$("books").innerHTML = "";
	var data = JSON.parse(ajax.responseText);
    for (var i = 0; i < data.books.length; i++) {
        var li = document.createElement("li");
        li.innerHTML = data.books[i].title + ", by " +
                data.books[i].author + " (" + data.books[i].year + ")";
        $("books").appendChild(li);
    } 

}

function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText + 
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}
