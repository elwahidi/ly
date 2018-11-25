$(document).ready(function () {
    $('body').on('click','#lang-switcher a',function () {
        var locale = $(this).attr('data-lang');
        var _token = $("form#language>input[name=_token]").val();

        $.ajax({
            url: "/language",
            type: 'POST',
            data:{locale:locale,_token:_token},
            datatype: 'json',
            success: function (data) {
            },
            error:function (data) {
            },
            beforeSend:function (data) {

            },
            complete:function (data) {
                window.location.reload(true);
                console.log(data);
            }
        })
    });
})
