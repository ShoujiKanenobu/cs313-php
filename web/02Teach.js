//Vanilla JS functions

function ClickedAlert() {
	alert("Clicked!");
}

function ChangeColor() {
  var InputColor = document.getElementById("textboxColor").value;
  document.getElementById("div1").style.color = InputColor;
}

//jQuery Functions

$(document).ready(function(){
      $("#jQbutton").click(function(){
        $("#div1").css("color", $("#textboxColor").val());
      });
    });

$(document).ready(function(){
      $("#jQtoggle").click(function(){
        $("#div3").toggle();
      });
    });