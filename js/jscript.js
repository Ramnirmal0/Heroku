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

    
});
