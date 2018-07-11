<!DOCTYPE html>
<html>
<head>
	<title>Branch</title>
</head>
<body>

	<form method="post" action="/branch/add" enctype="application/x-www-form-urlencoded" style="text-align: center;">
            {{csrf_field()}}
            <!-- <input type="hidden" name="id"> -->           

            <input type="text"  name="name" placeholder="Name"><br><br>
            
            <input type="Date" name="dob" placeholder="Date of Birth" ><br><br>
            <input type="text" name="latitude" placeholder="latitude""><br><br>
            <input type="text" name="longitude" placeholder="longitude"><br><br>
            <button type="submit" name="Save"> Add Branch</button> 
    </form>

</body>
</html>