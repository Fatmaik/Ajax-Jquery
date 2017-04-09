$(document).ready(function() {
    $("#AjaxRequest").submit(function() {
        
        var form = $(this).serialize();
        var request = $.ajax({
            method : "GET",
            url : "post.php",
            data : form,//{ nome : $(":input[name=name]").val()},
            dataType : "json"
        });
        request.always(function(e) {
            console.log(e);
            for(var k in e) {
                $(":input[name=" +k+ "]").val(e[k]);
            }
        })
    })
})