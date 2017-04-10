$(document).ready(function() {
    $("#AjaxRequest").submit(function() {
        
        var form = $(this).serialize();
        var request = $.ajax({
            methos : "GET",
            url    : "post.php",
            data   : form,
            dataType : "json"
        })
        
        request.done(function(e) {
            $("#msg").html(e.msg);
            if(e.status == "true") {
                $("#AjaxRequest").each(function() {
                    this.reset();
                })
            }   
        });
        
        return false;
    })
})