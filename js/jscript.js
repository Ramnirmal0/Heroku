$(function(){
    $('#register').click(function(e){

        var valid = this.form.checkValidity();

        if(valid){


            var username = $('#username').val();
            var emailid	= $('#emailid').val();
            var passwords = $('#passwords').val();
            var cpassword = $('#cpassword').val();

            if(passwords==cpassword){
            }
            else{
                alert("check password is correct");
                return;
            }

            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '../user.php',
                data: {username: username,emailid: emailid,passwords: passwords},
                success: function(data){
                    Swal.fire({
                        'title': 'Successful',
                        'text': data,
                        'type': 'success'
                        })
                        window.location.href = "../login.php";     
                },
                error: function(data){
                    Swal.fire({
                            'title': 'Errors',
                            'text': data,
                            'type': 'error'
                            })
                }
            });	
  
        }else{
            alert("fill the form completely");

        }
    });	
    
    
    $('#login').click(function(e){

        var valid_check = this.form.checkValidity();

        if(valid_check){
            var userid=$('#userid').val();
            var pwd = $('#pwd').val();
        }
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../process.php',
            data: {userid: userid,pwd: pwd},
            success: function(data){
                if(data == true){
                    window.location.href = "../account.php";
                }else{

                    Swal.fire({
                        'title': 'Login Failed',
                        'text': data,
                        'type': 'error'
                        })
                }

                    
            },
            error: function(data){
                Swal.fire({
                        'title': 'Errors',
                        'text': "something went wrong with database",
                        'type': 'error'
                        })
            }
        });	


    });	

    
});
