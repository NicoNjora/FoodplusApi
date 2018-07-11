<!DOCTYPE html>
<html>
<head>
	<title>Messenger</title>
</head>
<body>

	<form method="post" action="/messenger/add" enctype="application/x-www-form-urlencoded" style="text-align: center;">
            {{csrf_field()}}
            <!-- <input type="hidden" name="id"> -->           

            <input type="text"  name="name" placeholder="Name"><br><br>
            
            <input type="text" name="email" placeholder="Email" ><br><br>
            <input type="text" name="contacts" placeholder="contacts""><br><br>
            <input type="text" name="branch_id" placeholder="branch_id"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <button type="submit" name="Save"> Add Messenger</button> 
    </form>

</body>
</html>