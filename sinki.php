<?php
session_start();
header("Content-type: text/html; charset=utf-8");
//$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];
header('X-FRAME-OPTIONS: SAMEORIGIN');
?>
 <!DOCTYPE html>
   <html lang="ja">
<head>
<title>メール登録画面</title>
  <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
</head>
   <body>
   <h1>メール登録画面</h1>
   <form action = "sinki_check.php"  method="POST" >
            <p>メールアドレス：<input type = " text " name= "mail" size="50" > </p>
            <input type="hidden" name="token" value="<?=$token?>">
             <input type = "submit" name="submit1" value="登録する"></p>
</form>

</body>
</html>