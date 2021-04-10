<?php
	include("includes/header.php");
	include("includes/classes/User.php");
	include("includes/classes/Post.php");

	if(isset($_POST['post'])) {
		$post = new Post($connect, $userLoggedIn);
		$post->submitPost($_POST['post_text'], 'none');
		header("Location: index.php");
	}

?>
<br>
<div style="display: flex;" class="hide-on-med-and-down">
	<div style="transform: translateX(25vw); margin-top:0px; display:block;" >
			<div class="container" style="width:50vw;">
				<div class="card z-depth-2" style="border-radius: 10px; margin-bottom:40px;">
					<div class="card-content grey-text">
						<form class="row" action="index.php" method="post">
							<div class="input-field col s12">
          						<i class="material-icons prefix">mode_edit</i>
								<textarea name="post_text" id="feed_post" class="materialize-textarea"></textarea>
								<label for="feed_post">Write Something...</label>
							</div>
							<div class="row right-align" style="margin-bottom:-30px;">
								<button class="waves-effect waves-light btn-small light-blue darken-1" type="submit" name="post" id="post_button" value="Post"><i class="material-icons left">arrow_upward</i>Publish &nbsp;&nbsp;&nbsp;</button>
							</div>
						</form>	
					</div>
				</div>

				
				<div class="posts_area"></div>
<center>
				<div class="preloader-wrapper small active" id="loading">
					<div class="spinner-layer spinner-green-only">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div><div class="gap-patch">
						<div class="circle"></div>
					</div><div class="circle-clipper right">
						<div class="circle"></div>
					</div>
					</div>
				</div>
</center>
				<script>
					var userLoggedIn = '<?php echo $userLoggedIn;?>';
					
					$(document).ready(function(){
						$('#loading').show();

						//original ajax request for loading first post
						$.ajax({
							url: "includes/handlers/ajax_load_posts.php",
							type: "POST",
							data: "page=1&userLoggedIn=" + userLoggedIn,
							cache: false,

							success: function(data) {
								$('#loading').hide();
								$('.posts_area').html(data);
							}
						});

						$(window).scroll(function(){
							var height = $('.posts_area').height();	//div containing posts
							var scroll_top = $(this).scrollTop();
							var page = $('.posts_area').find('.nextPage').val();
							var noMorePosts = $('.posts_area').find('.noMorePosts').val();

							if((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
								$('#loading').show();
								
								var ajaxReq = $.ajax({
									url: "includes/handlers/ajax_load_posts.php",
									type: "POST",
									data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
									cache: false,

									success: function(response) {
										$('.posts_area').find('.nextPage').remove(); //removes current next page
										$('.posts_area').find('.noMorePosts').remove();

										$('#loading').hide();
										$('.posts_area').append(response);
									}
								});

							} //End if

							return false;

						});  //END $(window).scroll(function(){
					});


				</script>

				<!-- <div class="card blue-grey darken-1">
					<div class="card-content white-text">
					<span class="card-title">Card Title</span>
					<p>
					</p>
					</div>
					<div class="card-action">
					<a href="#">This is a link</a>
					<a href="#">This is a link</a>
					</div>
				</div> -->
			</div>
	</div>

	<div style="display:block; position:fixed; transform: translateX(77vw);">
		<div class="container" style="width:20vw; z-index:1; height: 15vh">
		<div class="card" style="border-radius:10px;">
					<div class="card-content" style='padding:14px;margin-right:96px; margin-left:10px;'>
						<div class="card-title"><i class="material-icons right">timeline</i>Your Stats</div>
							<h4 style="font-size:14px;">Posts: <?php 
								$user_post_num = new User($connect, $userLoggedIn);
								echo $user_post_num->getNumPosts();
							?>
							</h4>
					</div>
		</div>
	</div>
	
</div>

</body>
</html>

