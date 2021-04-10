<html>
<head>
    <title></title>  
	<script src="js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/main2.css?ver=1.1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
</head>
</html>

<body>
    <?php
        require 'config/config.php';
        include("includes/classes/User.php");
        include("includes/classes/Post.php");
        
        if(isset($_SESSION['username'])){
            $userLoggedIn = $_SESSION['username'];
            $user_details_query = mysqli_query($connect, "SELECT * FROM users WHERE username = '$userLoggedIn'");
            $user = mysqli_fetch_array($user_details_query);
        }
        else{
            header('Location: register.php');
        }
    ?>

    <script>
        function toggle() {
            var element = document.getElementById("comment_section");

            if(element.style.display == "block") {
                element.style.display = "none";
            } else {
                element.style.display = "block";
            }
        }
    </script>
    
    <?php
        //get id of post to fetch specific comments
        if(isset($_GET['post_id'])) {
            $post_id = $_GET['post_id'];
        }

        $user_query = mysqli_query($connect, "SELECT added_by, user_to FROM posts WHERE id='$post_id'");
        $row = mysqli_fetch_array($user_query);

        $posted_to = $row['added_by'];

        if(isset($_POST['postComment' . $post_id])) {
            $post_body = $_POST['post_body'];
            $post_body = mysqli_escape_string($connect, $post_body);
            $date_time_now = date("Y-m-d H:i:s");
            $insert_post = mysqli_query($connect, "INSERT INTO comments VALUES ('', '$post_body', '$userLoggedIn', '$posted_to', '$date_time_now', 'no', '$post_id')");
            echo "<p>Comment Posted!</p>";
        }

    ?>

    <form action="comment_frame.php?post_id=<?php echo $post_id;?>" id="comment_form" name="postComment<?php echo $post_id;?>" method="POST">
        <div class="input-field" style="display:flex">
            <textarea name="post_body" class="materialize-textarea" style="width:100%; margin-right:10%"></textarea>
            <label for="feed_post">Write comment...</label>
            <!-- <button class="waves-effect waves-light btn-small light-blue darken-4" type="submit" name="postComment<?php echo $post_id; ?>" id="comment_button" value="Post"><i class="material-icons left">arrow_downward</i><span style="color:white;z-index:9;">Post</span></button> -->
            <button class="waves-effect waves-light btn-small light-blue darken-4" type="submit" name="action"><i class="material-icons left">send</i>
            </button>
        </div>
    </form>

</body>