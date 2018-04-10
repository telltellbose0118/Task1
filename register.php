<?php
    session_start();

    require_once 'db_access.php';

    $register = false;
    $register_error = false;

    if(isset($_POST['new_user[]'])){

        db_access($db, $sql);
    }
?>
<html lang = "ja">
	<head>
		<meta charset = "utf-8">
		<meta http-equiv = "Content-Type" content = "text/html">
		<title>BBS_Register.php</title>
		<meta name = "author" content = "Ishikawa" >
		<meta name = "keywords" content = "BBS workport Volume2 Task">
		<meta name = "description" content = "this is bulletin board, which has some simple functions:User Authentication, search words, access management,paging and so on">
		<link rel = "icon" href = "img/favicon.ico">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <meta name="viewport" content="width = device-width,initial-scale = 1.0">
		<link rel = "stylesheet" type = "text/css" href = "base.css">
		<script type = "text/javascript" src = "base.js"></script>
		<script type = "text/javascript">
		</script>
  </head>
  <body>
    	<?php if($register_error){?>
    		<div class = "error">登録時にエラーが発生しました。<br>
    		</div>
    	<?php }?>
    <div id="register">
  		<form action = "register.php" method = "post">
  			<fieldset>
  			  <legend>登録フォーム</legend>
    			<table>
      			<tr><th>ユーザー名 :</th><td><input type = "text" name= "new_user['name']" value = "" required></td></tr>
  					<tr><th>パスワード :</th><td><input type = "password" name = "new_user['password']" value = "" required></td></tr>
  					<tr><th>パスワードを再度入力してください :</th><td><input type = "password" name = "new_user['password']" value = "" required></td></tr>
  					<tr><th>性別 :</th><td><input type = "radio" name= "new_user['gender']" value = "male" required selected><input type = "radio" name= "new_user['gender']" value = "female" required></td></tr>
  					<tr><th>年齢 :</th><td><input type = "text" name= "new_user['age']" value = "" required></td></tr>
  					<tr><th>E_mail :</th><td><input type = "text" name= "new_user['e_mail']" value = "" ></td></tr>
            <tr><td><input type = "submit" value = "register"></td><td><input type = "reset" value = "clear"></td></tr>
        	</table>
        	<input type = "hidden" name = "new_user['update_date']" value = "">
      	</fieldset>
    	</form>
    </div>
  </body>
</html>
