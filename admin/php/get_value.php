<?php
include_once('config.php');

if($_POST['type']==""){

		$country="";
		$sql=mysqli_query($con,"SELECT * FROM country");


		while($result=mysqli_fetch_assoc($sql)){
						
		     $country.="<option value='{$result['country_name']}'>{$result['country_name']}</option>";
					
		}
		echo $country;
}		
if ($_POST['type']=="statedata") {
  
	    $country_name=mysqli_real_escape_string($con,$_POST['category_name']);
		$state=" <option value='' selected>SELECT</option>";
		$sql=mysqli_query($con,"SELECT * FROM state WHERE country_name='{$country_name}' ");


			while($result=mysqli_fetch_assoc($sql)){
							
			     $state.="<option value='{$result['state_name']}'>{$result['state_name']}</option>";
						
			}
			echo $state;
}
if ($_POST['type']=="citydata") {
  
	    $state_name=mysqli_real_escape_string($con,$_POST['category_name']);
		$city=" <option value='' selected>SELECT</option>";
		$sql=mysqli_query($con,"SELECT * FROM city WHERE state_name='{$state_name}' ");


			while($result=mysqli_fetch_assoc($sql)){
							
			     $city.="<option value='{$result['city_name']}'>{$result['city_name']}</option>";
						
			}
			echo $city;
}				
				


			
		
	

?>