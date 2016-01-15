$(document).ready(function () {
    count_client_keyword();
})

function count_client_keyword()
{
    $.ajax({
        url: base_url+'keywords/count_client_keyword',
        data:{},
        type:'post',
        async:true,
        success:function (res) {
            $('#count_client_keyword').html(res.count);
        },
        dataType:'json'
    });
}
