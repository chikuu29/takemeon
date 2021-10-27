<?php

include_once('config.php');
$country_name=mysqli_real_escape_string($con,$_POST['country_name']);

if ($country_id==" ") {

         echo '<option value=" " selected>SELECT</option>';

	}else{
		$sql=mysqli_query($con,"SELECT * FROM state WHERE country_name='{$country_name}'");
		if (mysqli_num_rows($sql)>0) {
		   echo '<option value=" " selected>SELECT</option>';
		
			while($result=mysqli_fetch_assoc($sql)){
				echo "<option value='$result[state_name]'>$result[state_name]</option>";
			}
			
		}else{
			echo '<option value=" " selected>SELECT</option>';
		}
      
	}




?>