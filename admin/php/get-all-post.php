<?php
include_once 'config.php';
$sql=mysqli_query($con,"SELECT * FROM blog_post");
	?>
		    <thead >
	            <tr>
	               
	                <th>Post Id</th>
	                <th>Post Name</th>
	                <th>Post By</th>
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
                <th><?php echo $row['blog_post_id']; ?></th>
                <th><?php echo $row['blog_post_name']; ?></th>
                <th><?php echo $row['admin_user_id']; ?></th>
           
                <th>
                    <button type="button" class="btn btn-success"><a href="edit-post.php?q=<?php echo $row['blog_post_id']; ?>" class="text-white text-decoration-none ">Edit</a></button>
                </th>
                <th>
                    <button type="button" class="btn btn-danger">Delete</button>
                </th>
            </tr>




            <?php



		}
	}



?>