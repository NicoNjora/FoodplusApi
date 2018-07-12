<!DOCTYPE html>
<html>
<head>
	<title>Messenger</title>
</head>
<body>

	<form method="post" action="/login" enctype="application/x-www-form-urlencoded" style="text-align: center;">
            {{csrf_field()}}
            <!-- <input type="hidden" name="id"> -->           

          
            
            <input type="text" name="email" placeholder="Email" ><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <button type="submit" name="Login">Login</button> 
    </form>

</body>
</html>