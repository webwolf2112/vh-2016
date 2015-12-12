<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Print List</title>

</head>
<body>

<h1>Grocery List</h1>


<? 
	if(isset($_GET)){
	
	
		$message ="Grocery List \r";
		
		foreach ($_GET as $key => $value) {
		
		$message .= $value . "\r";
		
		 ?>
		
		<?=$value ?> <br/>
	
	
	<?	}
	
	}
?>


<form method="post">
<input type="hidden" name="email" value="1"></input>
<br/><br/>
<input type="submit" value="Email List To Us"/>  &nbsp; <button onclick="window.print();"/>Print List</button>
</form>

<br/><br/>



 

 <? 
 if (isset($_POST["email"])) {
    $to = "ourmagicallife@gmail.com"; 
    $subject = "Grocery List";
   
    // message lines should not exceed 70 characters (PHP rule), so wrap it

    // send mail
    mail($to,$subject,$message);
    echo "<br/> Your Grocery List has Been Mailed";
    }
?>


</body>
</html>

