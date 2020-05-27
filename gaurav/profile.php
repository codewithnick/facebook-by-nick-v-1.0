<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="addmie/css/styles.css">
    <link >
    <script src="addmie/js/app.js"></script>
    <title>Document</title>
</head>
<body>
    <?php include('header.php');?>
    <div class="grid-container">
        <div class="grid-container-left">
            <div class="profile">
                <div id="profile_picture"></div>
                <div id="username"><?php $username=$_SESSION['user_login'] ;echo $_SESSION['user_login']; global $username;?></div>
            </div>
            <div class="container">

            </div>
        </div>
        <div class="grid-container-right">
            <div class="postform">
            <?php
                function post(){
                    $db =new SQLite3('posts.db');
                    /* $db->exec('drop table if exists posts');
                    $db->exec('create table posts(
                        postid auto_increment int unique,
                        post varchar(225),
                        posted_date  date,
                        username varchar(25)
                    )'); */
                    if(isset($_POST['post'])){
                        $post=$_POST['post'];
                        $date_added=date("Y-m-d");
                        $db->exec("insert into posts values('','$post','$date_added','$GLOBALS ['username']')");
                        echo "posted";
                        header('loaction:profile.php');
                        echo'<h1>posted</h1>';
                    }
                    else{
                        echo 'not uploaded';
                    }
                    return 'profile.php';
                }
                ?>
                <form  method="POST" action="<?post();?>">
                    <input type='text' name='text' value='Write Something Here' required/>
                    <input id='post' type='submit' name='post' value='Post' onclick="javascript:send_post();"/>
                </form>
            </div>
            <div class="post-container">

            </div>
        </div>
    </div>
</body>
</html>