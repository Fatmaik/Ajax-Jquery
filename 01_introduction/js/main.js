$(document).ready(function(){
    // requiest acontece quando o formulario settar o submit
    $("#AjaxRequest").submit(function(){  
        var form = $(this).serialize(); // recebe todos os campos do form
        var request = $.ajax({          // variavel que recebe os valores por Ajax
            method: "GET",              // se nao for setado o method, ele sera altumaticamente como GET
            url: "test2.php",            // url sera o arquivo que recebe as requisicoes                
            data: form,                 // data receve os valores do form com jquery e armazena nas variaveis do php         
            dataType: "GET"            // dataType e o modo de retorn da requisizao (xml, html, text, json)
        });        
        
        
        
    });
});
