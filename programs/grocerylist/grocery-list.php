<?php
 include('db-connect.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
    <title><? echo $title ?></title>
    <link href="grocery.css" type="text/css" rel="stylesheet">
  </head>
  <body >

	<!-- posting form to same page pulling in variables to populate the grocery list -->

		<form method="post">

			<h1>Create Your Grocery List:</h1>
			<p><?
				// Select name of recipe and ID to populate the checkboxes 
	
			$recipeQuery = "SELECT name_of_recipe, recipe_id FROM Recipes;";
			
			 if($result = mysqli_query($con, $recipeQuery)) { 
			while($row = mysqli_fetch_assoc($result)) {?>
			<input type="checkbox" name="recipe_id[]" value="<?=$row['recipe_id']?>"><?=$row['name_of_recipe']?> 
			<!--recipe id: <?=$row['recipe_id']?>--></input>
			
			<? 
			} //END while($row = mysqli_fetch_assoc($result))
			} //END while($row = mysqli_fetch_assoc($result))
			?>
			
		<br/>
		<input type="submit" name="submit" value="submit"/></p>
		</form>
		

<p><i> *on submit will populate a grocery check box list</i></p>

	
<div class ="meals">
				
			
		
			
			<?
			
							
			
				
			
		 // Pulling the IDs from the posted checkbox form and making a new query to populate the grocery list 
			
			$recipeId = implode(',',$_POST['recipe_id']);  //create an array from the $_post variables to insert into the $ingredientList querie

			$ingredientList = "SELECT Recipes.recipe_id, Recipes.name_of_recipe, Ingredients.name, Ingredients.quanity, quanity.unit 
			FROM Recipes, Ingredients, quanity WHERE Recipes.recipe_id = Ingredients.recipe_id 
			AND Ingredients.measurement = quanity.quanity_id 
			AND Recipes.recipe_id
			IN ($recipeId);";

		
		// creating an array of the ingredient names in order to populate grocery list with total amount (ex eggs 6, vs eggs written 6 times in list)
		
			$ingredientNames = "SELECT DISTINCT name FROM Ingredients;";
		
			if($result= mysqli_query($con, $ingredientNames)){
				$nameArray = array();
				$count=0;
				while($name = mysqli_fetch_assoc($result)){
				
						$nameArray[$count] = $name['name'];
						$count += 1;

		 	}//END while($name = mysqli_fetch_assoc($result))
		 	}//END if($result= mysqli_query($con, $ingredientNames))
		 
		 ?>

 
<!--Populating list from the Post variables via check box submission-->

		<? if(isset($_POST['recipe_id'])) { ?>
		
			<div class="meal-list">
				<h2>Here is your list: </h2>
			
							
			<!--looping through the ingredients -->
										
			<p><? if($result= mysqli_query($con, $ingredientList)){
			
				// new array start at 0 to prevent malicious code (removed later)
				$firstArray = [0];
				
				while($row = mysqli_fetch_assoc($result)){
				
					$unit = $row['unit'];	
								
		//looping through and adding up the quanity values  *using the ingredient name array created above to test against to get quanity*
		
				foreach($nameArray as $name){
    				if($name == $row['name']){
    				
	    				${"quanity_{$name}"} += $row['quanity'];
	    				${"unit_{$name}"} = $row['unit'];
    				    				 
   				 } // END if($name == $row['name'])
				} // END foreach($nameArray as $name){ 
				
				// unset the first element of the array (removed the 0 added to prevent malicious code 
				unset($firstArray[0]);
				
				// Set New array to create new list
				array_push($firstArray, $row['name']);
								
			
		 } // END while($row = mysqli_fetch_assoc($result))
		}// END if($result= mysqli_query($con, $ingredientList)) ?>
		
		
		<!-- second loop through -->
		
			<?  $results = array_unique($firstArray); ?>
				
				<form action="/programs/grocerylist/print-list.php" method="get">
				
				<?
					foreach($results as $ingName ){ 
					
					// assigning a new value for the units  
					
		    				switch($ingName){
		    				
		    					case ${"unit_{$ingName}"} =='item':
		    						${"unit_{$ingName}"} = " ";
		     					break;
		     					
		     					case ${"unit_{$ingName}"} =="cup":		     					
		     					case ${"unit_{$ingName}"} =="tablespoon":
  		     					case ${"unit_{$ingName}"} =="teaspoon":
		     					case ${"unit_{$ingName}"} =="package":
		     					case ${"unit_{$ingName}"} =="can 16oz":
		     					case ${"unit_{$ingName}"} =="can 32oz":
		     					case ${"unit_{$ingName}"} =="bag":
		     					case ${"unit_{$ingName}"} =="box":
		     					case ${"unit_{$ingName}"} =="gallon":
		     					case ${"unit_{$ingName}"} =="lb":
		     						if(${"quanity_{$ingName}"} >1){
		    						${"unit_{$ingName}"} = ${"unit_{$ingName}"}."s";}
		    						else{
		    						${"unit_{$ingName}"} = ${"unit_{$ingName}"};
		    						}
		     					break;
		    					
		    				 	default:
		    						${"unit_{$ingName}"} = ${"unit_{$ingName}"};
		    					break;
		    					
		    				} //END switch ($row['unit'])
		    				
    			

			
			
			
			?>		
				
		<input type="checkbox" name="<?=$ingName?>" value="<?=$ingName?>" checked><?=$ingName?>, <?=${"quanity_{$ingName}"}?> <?=${"unit_{$ingName}"}?> </input><br/>
		
			<? } // END foreach($firstArray as $ingNames )?>
		
		
					
					
					<input type="submit" value="submit" </input>
					</form> 
		
			
	<? } // END if($_POST['recipe_id'])  {  ?>		
			

</div>



<br/><br/><br/><br/><br/>
<!--======================================== ADD A NEW RECIPE INTO THE DATABASE ================================================== -->

<?   

//Generating an array of  quanity id and name from database to populate the ingredients form //

$quan = "SELECT quanity_id, unit FROM `quanity`;";
		 	if(isset($_POST['numberOfIngredients'])){

//used to populate the selection total on submission  

 		$value = $_POST['numberOfIngredients'] ;
 		
 	}

		
			if($result= mysqli_query($con, $quan)){
				$quanity_array = array();
				
				while($name = mysqli_fetch_assoc($result)){
					$quanity_array[$name['quanity_id']] = $name['unit'];
						
					
		 	}//END while($name = mysqli_fetch_assoc($result))
		 	}//END
		 		
 
		 
// END pulling the quanity id and name from database to populate the ingredients form 


if(isset($_POST['recipe_name']) AND $_POST['recipe_name'] != ''){

	$rName = $_POST['recipe_name'];
	$rName = mysqli_real_escape_string($con, $rName);
	$rName = strip_tags($rName);

$addRecipe = "INSERT INTO Recipes (name_of_recipe) VALUE ('$rName')";


// pulling recipe ID to insert into database  
 	if(mysqli_query($con, $addRecipe)){ 
 	$newRecipeID =  mysqli_insert_id($con);
 	
 
 	?>

 	 <h1> <?= $rName ?> Has Been Added </h1>



 <? }    
} //END if(isset($_POST['recipe_name']) AND $_POST['recipe_name'] != '')
if(isset($_POST['recipe_name']) AND $_POST['recipe_name'] == ''){

	echo "<h1>Your Recipe Was Not Added. Please Make sure you have filled in the Recipe Name!</h1>";
}
?>

<div class ="new-meal">
	<h1>ADD A NEW RECIPE </h1>
	
	<!-- need to pull post variables to populate ingredient list -->

	<? if(!isset($_POST['numberOfIngredients'])){ ?>


	<form action="" method="post">
		<p>Number of Ingredients
				<select name="numberOfIngredients">
					<? for($i=1; $i< 50; $i+=5){
						 if($i == 1){ ?>
						 	<option value="1" name="ing_type">1 - 5</option>
						<? }else { ?>
						<option value="<?=$i?>" name="ing_type"><?=$i . ' - ' . ($i+4);?></option>
					<? }} ?>
				
				</select>
				<input type="submit" value="Submit">
			</p>
	</form>
	
		<? } else { ?>
	
		<button  onclick='window.location.reload(true);'>Change Ingredient Amount</button><br/><br/>
			<!-- begin recipe form -->
		
				<form  action="" method="post">   <!-- changed to GET for testing -->
					<label for="recipe_name">Recipe Name</label>
					<input name="recipe_name" type="text"></input><br/>
		
						<? 
						 //loop to populate the ingredients per how many 
						 $ingCount = $_POST['numberOfIngredients']+4;
						 	for($i=1; $i<= $ingCount; $i++){ ?> 
						 	
						 	
						 	<label for="ingredient_<?=$i ?>">Ingredient:</label>
							<input type="text" name="ingredient_<?=$i?>"></input>
							<label for="quanity_<?=$i ?>">Quanity:</label>

								<select name="quanity_<?=$i ?>">
									<option value="0">Select Quanity</option>
									<option value=".25" >1/4</option>
									<option value=".33" >1/3</option>
									<option value=".50" >1/2</option>
									
									<? for($x=1; $x<= 6; $x++) { ?>
										<option value="<?=$x?>"><?=$x?></option>
										<option value="<?=$x?>.25" > <?=$x?> 1/4</option>
										<option value="<?=$x?>.33" > <?=$x?> 1/3</option>
										<option value="<?=$x?>.5" > <?=$x?> 1/2</option>

									<? } ?>

								</select>
							
									<select name="quanityId<?=$i?>">
									<option value="0">Select Unit</option>
										<? foreach($quanity_array as $key => $value){ ?>
									<option value="<?=$key?>" name="ing1_type"><?=$value?></option>
										<? } //foreach($quanity_array as $quan) ?>
								  </select>
								  <br/>
					
					
					<? } //END or($i=0; $i<= $ingCount; $1++;)?> 
							<br/>
					<input type="hidden" name="AddRecipeForm" value="true"></input>
					 	
					<input type="submit" value="Submit Recipe Name">


				
				</form> 
		
		<? } //END if($_GET['numberOfIngredients']){  ?>


			<? if(isset($_POST['AddRecipeForm'])) {

					//$ingredientToAdd = array();
				$insertQuery =  "INSERT INTO Ingredients (name,recipe_id,quanity,measurement) VALUES ";

				

					$bracketO="(";
					$bracketC=")";
					$quote= "'";
				
				//temp recipe ID  *** NEED TO MAKE DYNAMIC ****
					//$newRecipeID = 55;
					$ingredientToAdd = 0;


					// running the for loop through the get (need to change to post varibles)//
					foreach($_POST as $key => $value){
						if( $value != null  && $value != 'true'){
							
							// a switch statement to test against the id's to put into the correct query 

							for($k=1; $k<=15; $k++){
								if($key == "ingredient_{$k}"){
									${"ingredient{$k}"} .= $quote . $value .$quote . ", ";
									$ingredientToAdd += 1;
								}
								if($key == "quanity_{$k}"){
								if($value == null){
										$value=0;
									}
									${"quanity{$k}"} .= $quote . $value . $quote . ", ";
								}
								if($key == "quanityId{$k}"){
									if($value == null){
										$value=6;
									}
				
									${"quanityId{$k}"} .= $quote . $value . $quote ;
								}
							}


					}// END if( $value != null && $value != '0' && $value != 'true')
				} // END foreach($_GET as $key => $value)
			

				for($s=1; $s<=$ingredientToAdd; $s++){
				

					if($s==$ingredientToAdd){

						$insertQuery .= $bracketO . ${"ingredient{$s}"} . $quote . $newRecipeID . $quote   . "," . ${"quanity{$s}"}  . ${"quanityId{$s}"}.$bracketC;
					} else{

					$insertQuery .= $bracketO . ${"ingredient{$s}"} . $quote . $newRecipeID  . $quote . "," . ${"quanity{$s}"}  . ${"quanityId{$s}"}.$bracketC . ", ";

					}
				}


				$insertQuery .= ";";
					echo $insertQuery . "<br/>";

   					echo "<h1>Recipe Has Been Added  ** after I hook up DB query</h1>";
   					

   					}

   						if(mysqli_query($con, $insertQuery)){ 
 						echo "ingredients added";
 					}

					?>
<br/><br/><br/><br/><br/>
<!--======================================== DELETE RECIPE  ================================================== -->


	<h1>Delete Recipe</h1>
		<p>** Need to set up edit functionality</p>
		
		<? 

			if(isset($_POST['deleteRecipeId'])){
			$deleteRecipeId = $_POST['deleteRecipeId'];
			}



			$deleteRecipeQuery = "DELETE FROM Recipes WHERE  recipe_id = ".  $deleteRecipeId ;
			$deleteIngredientQuery = "DELETE FROM Ingredients WHERE  recipe_id = ".  $deleteRecipeId ;
			
			if(mysqli_query($con, $deleteRecipeQuery)  && mysqli_query($con, $deleteIngredientQuery)){ 
 				echo "<h1>Recipe was deleted</h1>";
 	}
 
			
		?>

		<form method="post" >
			
			<!--<input type = "number" name="deleteRecipeId"></input>-->
			<select name="deleteRecipeId">
			<option value="0">Select Recipe To Delete</option>
			<?  if($result = mysqli_query($con, $recipeQuery)) { 
			while($row = mysqli_fetch_assoc($result)) {?>
			<option value="<?=$row['recipe_id']?>"><?=$row['name_of_recipe']?></option>
			
			<? 
			} //END while($row = mysqli_fetch_assoc($result))
			} //END while($row = mysqli_fetch_assoc($result))
			?>
			</select>
			<input type="submit"></input>
		</form>

</div>



</div> 
</body>
</html>