<?php 

include 'includes/header.php';
// session_destroy();

?>


	<div class="row">
		<div class="col-sm-4">
			<div class="user_details clearfix">
				<a href="<?php echo $userLoggedIn; ?>">
					<img src="<?php	echo $user['profile_pic']; ?>" alt="Profile Photo" class="img-thumbnail">
				</a>

				<div class="user_details_left">
					<a href="<?php echo $userLoggedIn; ?>">
						<?php  
							echo $user['first_name'] . " " . $user['last_name'];
							echo "<br>";
						?>
					</a>

					<?php  
						echo "Posts: " . $user['num_posts'];
						echo "<br>";
						echo "Likes: " . $user['num_likes'];
					?>
				</div>
			</div>
		</div>


		<div class="col-sm-8">
			<div class="main_column">
				<form action="index.php" method="POST" role="form" class="post_form">

					<div class="form-group">
						<textarea name="post_text" id="post_text" rows="4" placeholder="Got something to share?" class="form-control"></textarea>
					</div>
					


					<button type="submit" class="btn btn-primary" name="post" id="post_button">Post</button>
				</form>

			</div>
		</div>
	</div>





</div>
	
</body>
</html>