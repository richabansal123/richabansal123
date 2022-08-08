<?php 

	
	include('assets/db_connect.php');


	


	//check get request id param
	if(isset($_GET['id'])){

	$id = mysqli_real_escape_string($conn,$_GET['id']);

	//make sql
	$sql = "SELECT * FROM forum_topics where id = $id";

	//get query result
	$result = mysqli_query($conn,$sql);

	//fetch result in array format
	$topic = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($conn);
	}

	


 ?>
 <!DOCTYPE html>
 <html>
 	<?php include("header.php"); ?>

 	<div class="container center grey-text">
 		<?php if($topic): ?>

 			<h4><?php echo htmlspecialchars($topic['title']); ?></h4>
 			<h5>Content:</h5>
 			<p> <?php echo htmlspecialchars($topic['content']);  ?></p>
 			<p>Created by: <?php echo htmlspecialchars($topic['user_name']);  ?>
 			<p><?php echo date($topic['created_at']); ?></p>
 		<?php else: ?>
 			<h5>No such blog exist</h5>
 		<?php endif; ?>	
 	</div>

 	<?php include 'footer.php'; ?>
 </html>