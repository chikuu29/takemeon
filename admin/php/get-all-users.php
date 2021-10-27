<?php

include_once 'config.php';
$user_type=mysqli_real_escape_string($con,$_POST['type']);
if($user_type=='adminuser'){
	$sql=mysqli_query($con,"SELECT * FROM admin");
	?>
		    <thead >
	            <tr>
	                <th>No</th>
	                <th>User Id</th>
	                <th>Name</th>
	                <th>Type</th>
	                <th>Email</th>
	                <th>Status</th>
	                <th>Edit</th>
	                <th>Delete</th>

	            </tr>
            </thead>
            <tbody>
	<?php

	if (mysqli_num_rows($sql)>0) {

		 
		while($row=mysqli_fetch_assoc($sql)){

             
             ?>
              
              <tr>
                <th><?php echo $row['id']; ?></th>
                <th><?php echo $row['user_id']; ?></th>
                <th><?php echo $row['fname']."  ".$row['lname']; ?></th>
                 <th><?php echo $row['email']; ?></th>
                <th><?php echo $row['type']; ?></th>
                <th><?php echo $row['status']; ?></th>
                <th>
                    <button type="button" class="btn btn-success"><a href="edit.html" class="text-white text-decoration-none ">Edit</a></button>
                </th>
                <th>
                    <button type="button" class="btn btn-danger">Delete</button>
                </th>
            </tr>




            <?php



		}
	}
	

}



if($user_type=="normaluser"){

	$sql=mysqli_query($con,"SELECT * FROM users");
	?>
		    <thead>
	            <tr>
	                <th>No</th>
	                <th>User Id</th>
	                <th>Name</th>
	                <th>Email</th>
	                <th>Status</th>
	                <th>Edit</th>
	                <th>Delete</th>

	            </tr>
            </thead>
            <tbody>
	<?php

	if (mysqli_num_rows($sql)>0) {

		 
		while($row=mysqli_fetch_assoc($sql)){

             
             ?>
              
              <tr>
                <th><?php echo $row['id']; ?></th>
                <th><?php echo $row['unique_id']; ?></th>
                <th><?php echo $row['fname']."  ".$row['lname']; ?></th>
                <th><?php echo $row['email']; ?></th>
                <th><?php echo $row['status']; ?></th>
                <th>
                    <button type="button" class="btn btn-success"><a href="edit.html" class="text-white text-decoration-none ">Edit</a></button>
                </th>
                <th>
                    <button type="button" class="btn btn-danger">Delete</button>
                </th>
            </tr>




            <?php



		}


		
		
	}else{

		echo '<div class="alert alert-danger" role="alert">
				  No Users Are Availble
			  </div>';

	}


		?>
            </tbody>

		<?php

}
if($user_type=="googleuser"){

	$sql=mysqli_query($con,"SELECT * FROM google_client");
		
	if (mysqli_num_rows($sql)>0) {

		?>

		     <thead>
	            <tr>
	                <th>No</th>
	                <th>Token Id</th>
	                <th>Name</th>
	                <th>Email</th>
	                <th>Edit</th>
	                <th>Delete</th>
	            </tr>
            </thead>
            <tbody>




		<?php

		 
		while($row=mysqli_fetch_assoc($sql)){

	             
	             ?>
	                     <tr>
				                <th><?php echo $row['id']; ?></th>
				                <th><?php echo $row['token_no']; ?></th>
				                <th><?php echo $row['fname']."  ".$row['lname']; ?></th>
				                <th><?php echo $row['email']; ?></th>
				                <th>
				                    <button type="button" class="btn btn-success"><a href="edit.html" class="text-white text-decoration-none ">Edit</a></button>
				                </th>
				                <th>
				                    <button type="button" class="btn btn-danger">Delete</button>
				                </th>
                        </tr>
	              
	             

	            <?php

		}

	}else{
		
		echo '<div class="alert alert-danger" role="alert">
				  No Users Are Availble
			  </div>';
	}
	
	         ?>
	            </tbody>

			<?php


}








?>