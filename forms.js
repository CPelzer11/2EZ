function textarea(textarea_value) {

    var textarea_id = "textarea" + textarea_value;
    var textarea_text = document.getElementById(textarea_id).value;
    var input = document.getElementById("text" + textarea_value);
    input.value = textarea_text;
    
}

function button(button_value, textarea_value) {
    
    var clickedbutton = document.getElementById("button" + textarea_value);
    clickedbutton.value = button_value;
    
    
}