window.onload=function(){
	$("register_filter").observe("click", function(event){
		if(event.toElement==$("register_filter")){
			ghost_ani($("register_filter"));
			for(var i=0;i<$("register_filter").children.length;i++){
				if(!$("register_filter").children[i].hasClassName("dis_show")){
					$("register_filter").children[i].addClassName("dis_show");
				}
			}	
		}
	});
	// $("reg_btn").attachEvent("click",regBtnClick);
	$("reg_btn").observe("click", regBtnClick);
	$("student").observe("click", check_radio);
	$("professor").observe("click", check_radio);
	$("reg_cancel").onclick = function() {
		$("register_filter").style.display = "none";
		location.reload();
	}



}

function regBtnClick(event){
	ghost_ani($("register_filter"));
	$("register").toggleClassName("dis_show");

	// var values = document.getElementsByClassName("row"); // rows
	// var deep = 0;
	
	// for (var value in values) {
	// 	// if(value.children[0].value == )
	// 	if(value.children[0].value == "undefined"){
	// 		alert(value.children[0].value)	;
	// 	}
		// else if(value.children[0].value == "undefined"){
			// return;
		// }
		// else{
			// value.children[0].value = null;
		// }
	// }
}
function check_radio(evnet){
	if(this.value == "student") {
		 $("identity").value = "student";
	}
	if(this.value == "professor") {
		$("identity").value = "professor";
	}
}