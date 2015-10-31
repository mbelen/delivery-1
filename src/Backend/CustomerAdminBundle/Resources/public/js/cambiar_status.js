$(document).ready(function() {
    $("#status").on('click',function(){

        var path=$(this).data("url");

        var status = $('#status').val();
        var comentarios = $('#comentarios').val();

        var data = "statusId="+status+"&comentarios="+comentarios;

        $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: data,
        })
            .done(function(data) {
                console.log("todo bien");

            })
            .fail(function() {
                console.log( "can't change status" );
            });

    });



});

