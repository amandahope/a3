"use strict";

window.onload = function () {

    var resetButton = document.getElementById("reset");

    resetButton.addEventListener("click", resetForm);

    function resetForm(e) {
        var inputList = document.getElementsByTagName("input");
        for (var j=0; j<inputList.length; j++) {
            inputList[j].checked = false;
        }
        var optionList = document.getElementsByTagName("option");
        for (var i=0; i<optionList.length; i++) {
            var optionValue = optionList[i].value;
            if (optionValue == "") {
                optionList[i].selected = true;
            } else {
                optionList[i].selected = false;
            }
        }
        var alertList = document.getElementsByClassName("alert");
        for (var k=0; k<alertList.length; k++) {
            alertList[k].style.display = "none";
        }
        e.preventDefault;
    }

}
