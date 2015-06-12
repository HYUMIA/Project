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
      rooms[i].children[0].observe("click",setBackgroundColor1);
   }
   for(var i=0; i<times.length; i++){
      times[i].children[0].observe("click",setBackgroundColor2);
      times[i].children[0].observe("click",check);
   }
}
function opener(){
   var index = this.id[this.id.length-1];
   var room_list = $("room_list"+index);
   if(!this.hasClassName("showing")){
      this.addClassName("showing");
      for(var i = 0; i < room_list.children.length; i++){
         room_list.children[i].setStyle({
            'display' : "block"
         });
      }
   }else{
      this.removeClassName("showing");
      for(var i = 0; i < room_list.children.length; i++){
         room_list.children[i].setStyle({
            'display' : "none"
         });
      }
   }
}

function setBackgroundColor1() {
   var rooms = document.getElementsByClassName("room");
   for(var j=0; j<rooms.length; j++){
      rooms[j].children[0].removeClassName("backgroundColor");
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