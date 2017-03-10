$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Please review form to ensure you filled out all fields.");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Initiate Variables With Form Content
    var firstname = $("#firstname").val();
    var email = $("#email").val();
    var title = $("#title").val();
    var company = $("#company").val();
    var interestedproject = $("#interestedproject").val();
    var idea = $("#idea").val();
    console.log(interestedproject);


    $.ajax({
        type: "POST",
        url: "php/form-process.php",
        data: "firstname=" + firstname + "&email=" + email + "&title=" + title + "&company=" + company + "&idea=" + idea + "&interestedproject=" + interestedproject,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "Thank you for your message. We'll reach out soon.")
}

function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h4 text-center tada animated text-success";
    } else {
        var msgClasses = "h4 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}