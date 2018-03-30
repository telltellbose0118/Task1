<?php

        session_start();

        require_once 'db_access.php';

        /* ------------- Fields -------------- */

        $login_error = false;
        $insert_error = false;
        $login = false;
        $user = "";
        $name = "";

        /* ------------- Fields -------------- */

        /* ------------- login check -------------- */

        if(isset($_SESSION["user_name"])){
            $name = $_SESSION["user_name"];
            $login = true;
        }else {
            if(isset($_POST['user_name'])&&isset($_POST['password'])){
                $user = $_POST['user_name'];
                $pass = $_POST['password'];
                if(user_check($user, $pass)){
                    $_SESSION['user_name'] = $user;
                    $name = $user;
                    $login = true;
                }else {
                    $login_error = true;
                }
            }
        }

        /* ------------- login check -------------- */


        /* ------------- update 'post' table on 'bbs' databese -------------- */

        if($login){
            if (isset($_POST['title'])&&isset($_POST['content'])&&isset($_POST['date'])&&isset($_POST['name'])){
                $sql = "INSERT INTO posts VALUES ('".$_POST['title']."','".$_POST['content']."','".$_POST['date']."','".$_POST['name']."')";
                $insert_error = !db_access("bbs", $sql);
            }
        }

        /* ------------- update 'post' table on 'bbs' databese -------------- */

    ?>
    <html la = "ja">
    	<head>
    		<meta charset = "utf-8">
    		<meta http-equiv = "Content-Type" content = "text/html">
    		<title>BBS.php</title>
    		<meta name = "author" content = "Ishikawa" >
    		<meta name = "keywords" content = "BBS workport Volume2 Task">
    		<meta name = "description" content = "this is bulletin board, which has some simple functions:User Authentication, search words, access management,paging and so on">
    		<meta name = "icon" src = "">
    		<link rel = "stylesheet" type = "text/css" href = "base.css">
    		<script type = "text/javascript" src = "base.js"></script>
    		<script type = "text/javascript">
    		</script>
    	</head>
    	<body>

    		<!-- login form -->
    		<?php if(!$login){?>
    		<div id = "login">
    		    <h1>Bulletin Board</h1><br><br>
    		    <form action = "bbs.php" method = "post">
    		    	<p>ユーザー名  ：<input type = "text" name= "user_name" value = "<?=$user?>" required>
    		    	<p>パスワード  ：<input type = "password" name = "password" value = "" required><br>
    		    	<input type = "submit" value = "login">
    				<input type = "reset" value = "clear">
    		    </form>

    		<!-- login error report -->
			<?php if($login_error){?>
				<div class = "error">ユーザー名、若しくはパスワードが間違っています。</div>
			<?php }?>
			<!-- login error report -->

    		</div>
    		<!-- login form -->

    		<!-- bbs main page -->
    		<?php }else{?>
    		<header>
        			 <div id = 'login'><?=$name ?>さん</div>
    		</header>
    		<div id = "debug" title = "debug space" onclick = "alert('aaa');">a<?=!$login?>b<?=$user?><?=$name?></div>
    		<div id = "content">
    		<?php
    			  $posts = db_access("bbs", "SELECT * from posts");
    		?>
				<h1>Bulletin Board</h1>

			<!-- post error report -->
			<?php if($insert_error){?>
				<p class="error">投稿時にエラーが発生しました。
			<?php }?>
			<!-- post error report -->

    			<table>
    		<?php  while ($post = mysql_fetch_array($posts)){?>

    			    <tr><th>投稿者</th><td><?=$post['name'] ?></td></tr>
    				<tr><th>日時</th><td><?=$post['date'] ?></td></tr>
    				<tr><th>タイトル</th><td><?=$post['title'] ?></td></tr>
    				<tr><th>投稿内容</th></tr>
    				<tr><td><?=post['content'] ?></td></tr>

    		<?php }?>
    			</table>

				<form action = "bbs.php" method = "post">
					<fieldset>
						<legend>投稿フォーム</legend>
						<p>投稿者<?= $name ?>
    					<input type = "hidden"  name = "name" value = <?= $name?>>
    					<input type = "hidden" name = "date" value = "">
    					<p>タイトル： <input type = "text"  name = "title" value = "" required>
    					<p>投稿内容
    					<textarea cols= "50" rows = "50" name = "content" required></textarea><br>
    					<input type = "submit" title = "この内容で掲示板に投稿します" value = "投稿する">
    					<input type = "reset" title = "内容をリセットします" value = "内容をリセットする">
					</fieldset>
    			</form>
    			<?php }?>
    		</div>
    		<!-- bbs main page -->

        </body>
    </html>
