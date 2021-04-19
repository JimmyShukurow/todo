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

    $('.signIn').click(function(){
        $('.modalForSingIn').fadeIn();
        $('.overlay').css('display','block');
    })
    $('.register').click(function(){
        $('.modalForRegister').fadeIn();
        $('.overlay').css('display','block');
    })
    $('.closeSignInForm').click(function(e){
        e.preventDefault();
        $('.modalForSingIn').fadeOut();
        $('.overlay').css('display','none');
    })
    $('.closeRegisterForm').click(function(e){
        e.preventDefault();
        $('.modalForRegister').fadeOut();
        $('.overlay').css('display','none');
    })
    $('#signInForm').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "/login",
            data: $('#signInForm').serialize(),
            dataType: "json",
            success: function (response) {
               if(response.status == "success"){
                $('.modalForSingIn').fadeOut();
                $('.overlay').css('display','none');
                console.log(response.status);
                console.log(response.userName);
                console.log(response.userId);
                $welcomeText = '<section class="logout"> <a href="/logout"> logout </a></section><section class="welcome">Welcome <span class="userName">'+response.userName+'</span></section> ';            
                $('.partOne').html($welcomeText);
               }
            }
        });
    })
    $('#registerForm').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "/register",
            data: $('#registerForm').serialize(),
            dataType: "json",
            success: function (response) {
               console.log(response);
            }
        });
    })
})

