<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sensation Station</title>
 
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
        <link rel="stylesheet" href="http://dev.granddubai.com/sensation/assets/global/plugins/bootstrap/css/bootstrap.min.css">
    </head>

    <body>

        <div class="container">
			
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<br/>
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
 
			<div class="form">
			<div class="info">
				<h1><img src="<?= base_url() ?>files/images/logo-big.png"></h1><span>Login to your account</span>
			</div>
				<div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
				<form class="register-form">
					<input type="text"  placeholder="name"/>
					<input type="password"  placeholder="password"/>
					<input type="text" placeholder="email address"/>

				</form>
				<form class="login-form">
					<input type="text" id="user_name" placeholder="username"/>
					<input  id="password" type="password" placeholder="password"/>
					<span id="user_name-password-invalid"  style="color: red;display: none">Invalid User Name And Password</span>
					<button type="button" id="user_login">Login</button>
				</form>
			</div>
		</div>
		

				
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
  $(document).keypress(function (e) {
        if (e.which == 13) {
             $('#user_login').click();
        }
    });

    $(document).ready(function () {
        $('#user_login').click(function () {
            if ($('#user_name').val() == '') {
                $('#user_name').focus();
                $('#user_name').css('border-color', 'red');
                $('#user_name-error').show();
                return false;
            } else {
                var user_name = $('#user_name').val();
                $('#user_name').css('border-color', '');
                $('#user_name-error').hide();
            }
          
            if ($('#password').val() == '') {
                $('#password').focus();
                $('#password').css('border-color', 'red');
                $('#user_name-password').show();
                return false;
            } else {
                var password = $('#password').val();
                $('#password').css('border-color', '');
                $('#user_name-password').hide();
            }
            var data = {user_name: user_name, password: password};
            console.log(data)
            $.ajax({
                url: "Login/user_login",
                async: true,
                type: 'POST',
                data: data,
                success: function (data) {
                    var json = jQuery.parseJSON(data);
                    if (json.status == 'success') {
                        $('#user_name-password-invalid').hide(500);
                        window.location.href = 'Home/';
                    } else {
                        $('#user_name-password-invalid').html(json.msg)
                        $('#user_name-password-invalid').show();
                        
                    }

                }
            })
        });
    })
</script>
