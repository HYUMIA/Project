window.onload = function(){
   var showroom = $("showroom");
   var floors = showroom.children.length;
   for (var i = 0; i < floors; i++) {
      if( showroom.children[i].hasClassName("floors") ){
         showroom.children[i].observe("click",opener);
      };
   };
   var rooms = document.getElementsByClassName("room");
   var times = document.getElementsByClassName("time");
   for(var i=0; i<rooms.length; i++){
      rooms[i].observe("click",showTimeLine);
   }

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
   $("logout").observe("click",logout);
   $("G1_box").observe("click",checkBuilding);
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

function showTimeLine(){
   var rooms = document.getElementsByClassName("room");
   for(var j=0; j<rooms.length; j++){
      rooms[j].removeClassName("backgroundColor");
   }
   this.addClassName("backgroundColor");
/*
   if($("G1_box").checked && $("date").children[0].value){
      new Ajax.Request("./time.php",//DB URL
       {
           method:'post',
           parameters : {"day":$("date").children[0].value, "building" : "Y05", "room" : this.value},
         onSuccess : function(ajax){
            var json = JSON.parse(ajax.responseText);
            var timelines = $("timeline");
            var len = timelines.children.length;
            var reservedTime = json["time"];
            var count = 0;
            for(var i = 0; i < len; i++){
               if(reservedTime[count] == timelines.children[i].children[0].children[0].value) {
                  count++;
               }else{
                  timelines.children[i].removeClassName("dis_show");
               }
            }
         }
      });
   }*/
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