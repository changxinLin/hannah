<?php
    $file = fopen( 'count.txt', 'r+' );
    $count = fgets($file,10);
    $count++;
    rewind($file);
    fputs($file, $count);
    fclose($file);
?>
<?php
    $user='ユーザー名';
    $password='パスワード';
    $dsn='データベース名';
    $pdo=new PDO($dsn,$user,$password);
    $pdo ->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
      
      $sql="CREATE TABLE if not exists FM" //テーブルの作成
    ."("
    ."id INT AUTO_INCREMENT,"
    ."name char(32) NOT NULL,"
    ."comment TEXT,"
    ."PRIMARY KEY(id)"
    .");";
    $stmt = $pdo -> query($sql);  
   
    $name=$_POST['name'];
    $comment=$_POST['comment']; 
       if(isset($_POST['submit1']) &&!empty($_POST['name']) && !empty($_POST['comment'])){  
    
  
    $sql = 'INSERT INTO FM(id,name, comment) VALUES(" ","'.$name.'","'.$comment.'")';
    $stmt ->bindValue(':name',  $name,  PDO::PARAM_STR);
    $stmt ->bindValue(':comment',  $comment,  PDO::PARAM_STR);
   $stmt=$pdo->prepare($sql);
   $stmt ->execute();

  
   }
   ?>
   <!DOCTYPE html>
   <html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style_main.css" media="all" />
</head>
<body>
<?php
session_start();
 
header("Content-type: text/html; charset=utf-8");
 
// ログイン状態のチェック
if (!isset($_SESSION["account"])) {
	header("Location: main.php");
	exit();
}
 
$account = $_SESSION['account'];
$account1=htmlspecialchars($account,ENT_QUOTES);
echo "<p>".htmlspecialchars($account,ENT_QUOTES)."さん、こんにちは！</p>";
// echo "<p class="pattern">".htmlspecialchars($account,ENT_QUOTES)."さん、こんにちは！</p>";

?>
<?php
    echo "あなたは{$count}人目のお客様です。";
?>
<hr  style="border-style:dotted">
<ul>
<div id="toppage">
<a href="login.php">ログアウト</a>
</div>
</ul>
<br>
 <?php   //テーブルを表示
 
   $sql=  'SELECT*FROM  FM order by id ';
   $result = $pdo -> query($sql);
   date_default_timezone_set('Asia/Tokyo');
  foreach($result as $row){
         echo  $row['name'].'<br>';
         echo  $row['comment'].'<br>';
         echo date("Y/m/d H:i:s").'<br>';
    }
  ?>
<br>
<hr  style="border-style:dotted">
<form action = "main.php"  method="POST" >
            <p>名前:</p>
            <p><input type = " text " class= name= "name" size=30  value="<?=$account1?> "> </p>
             <p>コメント:</p>
             <p><textarea name= "comment"  cols=50 rows=5></textarea></p>
             <input type = "submit" name="submit1" value="送信"></p>
</form>    
</body>
</html>    