<!DOCTYPE html>
<html>
<head>
	<title>Messenger</title>
    <style type="text/css">
        .login{
            margin-top: 50px;
            text-align: center;
        }

    </style>
</head>
<body>

	<div class="login">

        <h3>Please enter your login details</h3>
        <form method="post" action="/login" enctype="application/x-www-form-urlencoded" >
                {{csrf_field()}}
                <!-- <input type="hidden" name="id"> -->           

              
                
                <input type="text" name="email" placeholder="Email" ><br><br>
                <input type="password" name="password" placeholder="password"><br><br>
                <button type="submit" name="Login">Login</button> 
        </form>
    </div>

</body>
</html>