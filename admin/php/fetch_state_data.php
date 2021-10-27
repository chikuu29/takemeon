<?php

include_once 'config.php';
$country_name=mysqli_real_escape_string($con,$_POST['country_name']);
$sql="SELECT * FROM state WHERE country_name='{$country_name}'";
?>
		    <thead >
	            <tr> 
	               
	                <th>State Id</th>
	                <th>State Name</th>
	                <th>Post By</th>
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
                <th><?php echo $row['state_id']; ?></th>
                <th><?php echo $row['state_name']; ?></th>
                <th><?php echo $row['admin_user_id']; ?></th>
           
                <th>
                    <button type="button" class="btn btn-success"><a href="edit-state.php?q=<?php echo $row['state_id']; ?>" class="text-white text-decoration-none ">Edit</a></button>
                </th>
                <th>
                    <button type="button" class="btn btn-danger">Delete</button>
                </th>
            </tr>

    <?php

}




?>