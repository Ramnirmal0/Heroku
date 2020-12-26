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
            return;
        }

            e.preventDefault();	

            $.ajax({
                type: 'POST',
                url: 'user.php',
                data: {username: username,emailid: emailid,password: password},
                success: function(data){
                Swal.fire({
                            'title': 'Successful',
                            'text': data,
                            'type': 'success'
                            })
                        
                },
                error: function(data){
                    Swal.fire({
                            'title': 'Errors',
                            'text': 'There were errors while saving the data.',
                            'type': 'error'
                            })
                }
            });

            
        }else{
            
        }
    });		

    
});
