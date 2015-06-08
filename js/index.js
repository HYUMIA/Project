window.onload=function(){
	$("register_filter").observe("click", function(event){
		if(event.toElement==$("register_filter")){
			$("register_filter").addClassName("dis_show");
			for(var i=0;i<$("register_filter").children.length;i++){
				if(!$("register_filter").children[i].hasClassName("dis_show")){
					$("register_filter").children[i].addClassName("dis_show");
				}
			}	
		}
	});
	// $("reg_btn").attachEvent("click",regBtnClick);
	$("reg_btn").observe("click", regBtnClick);
	$("reg_cancel")
	$("student").observe("click", check_radio);
	$("professor").observe("click", check_radio);
	$("number").style.display = "none";
}	
function regBtnClick(event){
	// ghost_ani($("register_filter"));
	$("register_filter").toggleClassName("dis_show");
	$("register_form").toggleClassName("dis_show");
	// location.reload();
}
function check_radio(evnet){
	if(this.value == "student") {
		 $("number").style.display = "block";
	}
	else {
		$("number").style.display = "none";
	}
}