$(document).ready(function(){

   // requiest acontece quando o formulario settar o submit
    $("#AjaxRequest").submit(function(prevent){
        prevent.preventDefault();
        var form = $(this).serialize();  // recebe todos os campos do form
        var request = $.ajax({           // variavel que recebe os valores por Ajax
            method: "POST",              // se nao for setado o method, ele sera altumaticamente como GET
            url: "test2.php",            // url sera o arquivo que recebe as requisicoes                
            data: form,                  // data receve os valores do form com jquery e armazena nas variaveis do php         
            dataType: "json"             // dataType e o modo de retorn da requisizao (xml, html, text, json)
            
        });
        request.done(function(e) {
                $("#status").html(e.status);
        });    
    });
 
    var sel = $.ajax({
        method   : "GET",
        url      : "test2.php",
        data     : {GET : "GET"}, // retornando o FetchAll do metodo PHP para dentro deste "GET"
        dataType : "json"
    }).done(function(table) {
        var x = $(".table").html();
        
        $.each(table, function(ind) {
            
            x += "<td>" + table[ind].id+ "</td>";
            x += "<td>" + table[ind].nome + "</td>";
            x += "<td>" + table[ind].email + "</td>";
            x += "<td>" + table[ind].tel + "</td>" + "</tr>"; 
        });  
        $("#contacts").html(x);
     })
     
});
