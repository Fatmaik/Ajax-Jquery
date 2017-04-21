$(document).ready(function(){
   
    // requiest acontece quando o formulario settar o submit
    $("#AjaxRequest").submit(function(prevent){
        prevent.preventDefault();
        var form = $(this).serialize(); // recebe todos os campos do form
        var request = $.ajax({          // variavel que recebe os valores por Ajax
            method: "GET",              // se nao for setado o method, ele sera altumaticamente como GET
            url: "test2.php",            // url sera o arquivo que recebe as requisicoes                
            data: form,                 // data receve os valores do form com jquery e armazena nas variaveis do php         
            dataType: "json"          // dataType e o modo de retorn da requisizao (xml, html, text, json)
            
        });
        request.done(function(e) {
                $("#status").html(e.status);
                $("#status1").html(e.status1);
            
            
        });
        
        
    });
    





    // var sel = $.ajax({
    //     method   : "GET",
    //     url      : "test2.php",
    //     data     : {selId : "", selName : "", selEmail : "", selTel : "" }
    // }).done(function() {
    //     var x = $(".table").html();
    //     for(var i=1; i<10; i++) {
    //         x += "<td>" + i + "</td>" + 
    //             "<td>dionathan</td>" +
    //             "<td id='tdEmail'>Otto</td>" +
    //             "<td id='tdTel'>@mdo</td>" + "</tr>"; 
    //         $("#contacts").html(x);
    //     }
    //  })
});
