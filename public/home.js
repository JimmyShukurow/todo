$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addContentToList').on('submit', function(e){
        e.preventDefault();
        var name = $('#nameOfContent').val();
        var description = $('#description').val();
        $.ajax({
            type: "post",
            url: "/addingToList",
            data: $('#addContentToList').serialize(),
            dataType: "json",
            success: function (response) {
               console.log(response);
            }
        });
        return false;
        
    })

})

