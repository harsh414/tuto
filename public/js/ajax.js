$(document).ready(function(){
    $("form").on('submit',function (e){
        e.preventDefault();
        var name= $("#name").val();
        var email=$("#email").val();
        var formData= $("form").serializeArray();
        $.ajax({
            url:"create",
            type:"post",
            data: formData,
            dataType : "json",
            success:function(response) {
                if (response.success)
                {
                    $("#msg").fadeIn().html(response.message);
                    setTimeout(function () {
                        $("#msg").fadeOut()
                    }, 2000);
                }
            }

        });

    });
});
