$(function(){
    $('#AjaxRequest').submit(function(){
        // recebe todos os campos do form
        var form = $(this).serialize();

        // variavel que recebe os valores por Aja
        var request = $.ajax({
            method:"POST",
            url:"post.php",
            // data receve os valores do form com jquery e armazena 
            // nas variaveis do php 
            data:form
        });
        request.always(function(e) {
            console.log(e);
        });

        // retornar false impede qua a pagina atualize sosinha
        return false;
    });
});
