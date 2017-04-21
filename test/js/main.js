$(document).ready(function(){
   
    $("#form").submit(function(e) {
        e.preventDefault();
       
        var ser = $(this).serialize();

        var request = $.ajax({
            method  : "GET",
            url     : "post.php",
            data    : ser,
            dataType: "json"
        });
        request.always(function(e) {
            $("#div").html(e.banda);
            alert("Always");
        });
        request.done(function(r) {
            $("#div1").html(r.Estilo);
            alert("done");
        });
        request.fail(function() {
            alert("erro");
        })


    });


    // request.done(function(req) {
    //     alert("test");
    //     $("#div").html(req.nome);
          
    // })

});
