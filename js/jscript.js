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
            window.location = '../user.php';
  
        }else{
            alert("fill the form completely");

        }
    });		

    
});
