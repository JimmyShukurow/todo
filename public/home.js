$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addContentToList').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "/addingToList",
            data: $('#addContentToList').serialize(),
            dataType: "json",
            success: function (response) {
               console.log(response);
               $details = '';
               for(var i =0; i< response.details.length; i++){
                    $details += '<div class="todoList"><h3> '+response.details[i]['name']+'</h3><input type="hidden" value="{{$item->id}}" id="idOfDeailsItem"><input class="detailsOfTodoList" value="'
                    +response.details[i]['description']+'" readonly><span class="deleteDetails">sil</span><span class="saveDetails">kaydet</span> <span class="editDetails"> duzenle</span></div>';
               }
               $('.listOfThings').html($details);
            //    $("#nameOfContent").val('');
            //    $("#description").val('');
               
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
                $welcomeText = '<section class="logout"> <a href="/logout"> logout </a></section><section class="welcome">Welcome <span class="userName">'
                +response.userName+'</span></section> ';            
                $('.partOne').html($welcomeText);
                $details = '';
               for(var i =0; i< response.details.length; i++){
                    $details += '<div class="todoList"><h3> '+response.details[i]['name']+'</h3><input type="hidden" value="{{$item->id}}" id="idOfDeailsItem"><input class="detailsOfTodoList" value="'
                    +response.details[i]['description']+' " readonly><span class="deleteDetails">sil</span><span class="saveDetails">kaydet</span> <span class="editDetails"> duzenle</span></div>';
               }
               $('.listOfThings').html($details);
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
    $('.editDetails').on('click', function(){
        $oneBefore = $(this).prev();
        $twoBefore = $oneBefore.prev();
        $twoBefore.prev().removeAttr('readonly').focus();
    })
    
    $('.deleteDetails').on('click',function(){
        $oneBefore = $(this).prev();
        $id = $oneBefore.prev().val();
        console.log($id);
        $oneBefore.parent().remove();
        $.ajax({
            type:"post",
            url:"/deleteDetails",
            data:{"id":$id},
            dataType:"json",
            success: function(response){
                console.log(response);
            }
        })

    })

})

