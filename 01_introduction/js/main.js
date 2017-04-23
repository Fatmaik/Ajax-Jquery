$(document).ready(function(){
//    var table = $.ajax({
//        method: "GET",
//        url   : "test2.php",
//        data  : {table : "$sel"},
//        dataType : "json",
//    });
//    table.always(function(e) {
//        alert(e.table);
//    })
//    table.done(function(e) {
//        alert("tteastr");
//         var x = "";
//         for(var i=1; i<10; i++) {
//             x += "<td>" + e.id + "</td>" + 
//                 "<td>dionathan</td>" +
//                 "<td id='tdEmail'>Otto</td>" +
//                 "<td id='tdTel'>@mdo</td>" + "</tr>";
//         }
//         $(".table").html(x);
//    })

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
        data     : {id : "", nome: "", email : "", tel : "", count1 : ""},
        dataType : "json"
    }).done(function(table) {
        // alert(table.count);
        var x = $(".table").html();
        
        // for(var i=1; i<10; i++) {
            
        //     x += "<td>" + table.id+ "</td>";
        //     x += "<td>" + table.nome + "</td>";
        //     x += "<td>" + table.email + "</td>";
        //     x += "<td>" + table.tel + "</td>" + "</tr>"; 
        //     $("#contacts").html(x);
        // }
        
        $.each(table, function(ind, vlor) {
            
            x += "<td>" + table.id+ "</td>";
            x += "<td>" + table.nome + "</td>";
            x += "<td>" + table.email + "</td>";
            x += "<td>" + table.count + "</td>" + "</tr>"; 
            
        });
        $("#contacts").html(x);
        
     })
});
