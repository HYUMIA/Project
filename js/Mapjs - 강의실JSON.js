window.onload = function(){
   var showroom = $("showroom");
   var floors = showroom.children.length;
   for (var i = 0; i < floors; i++) {
      if( showroom.children[i].hasClassName("floors") ){
         showroom.children[i].observe("click",opener);
      };
   };
   
   var times = document.getElementsByClassName("time");

   for(var i=0; i<times.length; i++){
      times[i].children[0].observe("click",setBackgroundColor2);
      times[i].children[0].observe("click",check);
   }
   $("cancel_filter").observe("click", function(event){
      if(event.toElement==$("cancel_filter")){
         ghost_ani($("cancel_filter"));
         for(var i=0;i<$("cancel_filter").children.length;i++){
            if(!$("cancel_filter").children[i].hasClassName("dis_show")){
               $("cancel_filter").children[i].addClassName("dis_show");
            }
         }  
      }
   });
   $("cancelBtn").observe("click",cancel);
   $("quit").observe("click", function(event){
      if(event.toElement==$("cancel_filter")){
         ghost_ani($("cancel_filter"));
         for(var i=0;i<$("cancel_filter").children.length;i++){
            if(!$("cancel_filter").children[i].hasClassName("dis_show")){
               $("cancel_filter").children[i].addClassName("dis_show");
            }
         }
      }
   });
   $("reservationCancelBtn").observe("click", function(event){
      var nums = document.getElementsByClassName("num");
      for(var i=1; i < nums.length; i++){
         if(document.getElementsByClassName("num")[i].children[0].checked)
            alert("예약이 취소되었습니다.");
      }
   });
   $("reservationCancelBtn").observe("click", reservationCancel);
   $("logout").observe("click",logout);
   $("G1_box").observe("click",checkBuilding);
   $("G1").observe("click",showLectureRoom);
   $("date").observe("mouseout",showLectureRoom);
}
function opener(){
   var index = this.id[this.id.length-1];
   var room_list = $("room_list"+index);
   if(!this.hasClassName("showing")){
      this.addClassName("showing");
      for(var i = 0; i < room_list.children.length; i++){
         room_list.children[i].removeClassName("dis_show");
      }
   }else{
      this.removeClassName("showing");
      for(var i = 0; i < room_list.children.length; i++){
         room_list.children[i].addClassName("dis_show");
      }
   }
}

function setBackgroundColor1() {
   var rooms = document.getElementsByClassName("room");
   for(var j=0; j<rooms.length; j++){
      rooms[j].removeClassName("backgroundColor");
   }
   this.addClassName("backgroundColor");
}

function setBackgroundColor2() {
   var times = document.getElementsByClassName("time");
   if(this.children[0].checked) {
      this.addClassName("backgroundColor");
   }
   if(!this.children[0].checked) {
      this.removeClassName("backgroundColor");
   }
}

function check() {
   var checks = 0;
   var times = document.getElementsByClassName("time");
   for(var i=0; i<times.length; i++){
      if(times[i].children[0].children[0].checked) checks++;
   }
   if(checks > 4){
      alert("Can't select more than 2 hours");
      this.removeClassName("backgroundColor");
      this.children[0].checked = false;
   }

}

function cancel() {
   ghost_ani($("cancel_filter"));
   $("cancel").toggleClassName("dis_show");

}

function logout() {
    window.location="./index.php";
}

function showLectureRoom(){
   if($("G1_box").checked && $("date").children[0].value){
      var room_lists = document.getElementsByClassName("room_list");
      for(var i=0; i<room_lists.length; i++){
         for(var j=0; j<room_list[i].length; j++){
            room_list[i][j].removeChild();      
         }
      }
      new Ajax.Request("./test.php",//DB URL
       {
           method:'post',
           parameters : {"day":$("date").children[0].value, "building" : "Y05"},
         onSuccess : function(ajax){
            // alert(ajax.responseText);
            var json = JSON.parse(ajax.responseText);
            console.log(json);
            $("building").innerHTML = json['building'];
            var floors = json['rooms'];
            for(var i = 0; i < floors.length; i++){
               var floor = floors[i].toString().substring(0,1);
               var ul = document.createElement("ul");
               ul.addClassName("room");
               ul.addClassName("dis_show");
               var label = document.createElement("label");
               var input = document.createElement("input");
               var span = document.createElement("span");
               span.innerHTML = floors[i] + "호";
               input.setAttribute("type","radio");
               input.setAttribute("name","room");
               input.setAttribute("value",floors[i]);
               
               label.appendChild(input);
               label.appendChild(span);
               ul.appendChild(label);
               $("room_list"+floor).appendChild(ul);
               $("floor"+floor).removeClassName("dis_show");
            };
            var rooms = document.getElementsByClassName("room");
            for(var i=0; i<rooms.length; i++){
               rooms[i].observe("click",setBackgroundColor1);
            }
         }
      });      
   }
}
function checkBuilding() {
   if($("G1_box").checked) {
      $("G1").setStyle({
         'top' : "-355px"
      });
   }
   else {
      $("G1").setStyle({
         'top' : "-350px"
      });
   }
}

function reservationCancel() {
   var nums = document.getElementsByClassName("num")
}
