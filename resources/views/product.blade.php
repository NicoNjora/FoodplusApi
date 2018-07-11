<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
</head>
<body>

	<form method="post" action="/product/add" enctype="application/x-www-form-urlencoded" style="text-align: center;">
            {{csrf_field()}}
            <!-- <input type="hidden" name="id"> -->           

            <input type="text"  name="name" placeholder="Name"><br><br>
            
            <input type="text" name="product_image" placeholder="product_image" ><br><br>
            <input type="text" name="price" placeholder="price"><br><br>
            <button type="submit" name="Save"> Add Product</button> 
    </form>

</body>
</html>