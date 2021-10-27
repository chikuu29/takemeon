<?php

include_once 'config.php';
$country_name=mysqli_real_escape_string($con,$_POST['country_name']);
$state_name=mysqli_real_escape_string($con,$_POST['state_name']);
$city_name=mysqli_real_escape_string($con,$_POST['city_name']);
$sql="SELECT * FROM post WHERE country_name='{$country_name}' && state_name='{$state_name}' && city_name='{$city_name}'";
?>
		    <thead >
	            <tr> 
	               
	                <th>Place Id</th>
	                <th>Place Name</th>
                    <th>Upload Date</th>
	                <th>Edit</th>
	                <th>Delete</th>

	            </tr>
            </thead>
            <tbody>
<?php
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
     
    ?>
    <tr>
            <th><?php echo $row['post_id']; ?></th>
            <th><?php echo $row['post_name']; ?></th>
            <th><?php echo $row['post_date']; ?></th>
       
            <th>
                <button type="button" class="btn btn-success"><a href="edit-place.php?q=<?php echo $row['post_id']; ?>" class="text-white text-decoration-none ">Edit</a></button>
            </th>
            <th>
                <button type="button" class="btn btn-danger">Delete</button>
            </th>
        </tr>

<?php




}



?>