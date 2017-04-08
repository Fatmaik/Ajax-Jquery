$(document).ready(function(){
    // requiest acontece quando o formulario settar o submit
    $('#AjaxRequest').submit(function(){  
        var form = $(this).serialize(); // recebe todos os campos do form
        var request = $.ajax({ // variavel que recebe os valores por Ajax
            method:"GET",      // se nao for setado o method, ele sera altumaticamente como GET
            url:"post.php",    // url sera o arquivo que recebe as requisicoes       
            /* 
            data receve os valores do form com jquery e armazena 
            nas variaveis do php 
            */ 
            data:form,
            // dataType e o modo de retorn da requisizao (xml, html, text, json)
            dataType: "json"
        });        
        request.always(function(e) {
            console.log(e.name);
            for(var k in e) {
                $(":input[name= " +k+ "]" ).val(e[k]);
            }
        });
        request.done(function(e) {
            console.log(e);
        }) 
        request.fail(function(e){
            console.log(e);
        })
        return false;  // retornar false impede qua a pagina atualize sosinha
    });
});
