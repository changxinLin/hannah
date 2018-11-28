<?php
session_start();
 
header("Content-type: text/html; charset=utf-8");
 
//クロスサイトリクエストフォージェリ（CSRF）対策
//$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];
 
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
 
?>
 <!DOCTYPE html>
   <html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css" media="all" />
  <style>
</head>
</head>

   <body>
    <form  action="login_check.php" method="post" >
    <div class="main">
       <p class="sign" align="center">LOGIN</p>
       <form class="form1">
        <dl>
       <input  class="un" align="center" placeholder="Username" type="text"  name="account"  >
        <input class="pass" align="center" placeholder="password" type="text"  name="password"  >
        </dl>
        <input type="hidden" name="token" value="<?=$token?>">
       
        <input type="submit"  name="login" value="login" class="button" align="center">
        
        <p class="sinki" align="center"><a href="sinki.php" >新規登録</p>
        </div>
    </form>
  </body>
  </html>   