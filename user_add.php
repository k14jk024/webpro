<?php
include ('page_header.php');

include_once('db_inc.php');//データベース接続のプログラムを読み込む

?>
<form action="user_add_save.php" method="post">

ユーザID：<input type="text" name="userid" value="" />
<br>
ユーザ名：<input type="text" name="username" value="" />
<br>
パスワード：<input type="text" name="userpassword" value="" />
<br>

ユーザ種別：<input type="text" name="usersyubetu" value="" />

<input type="submit" name="a" value="送信"/>
<input type="reset" value="取消"/>
</form>
<?php
include ('page_footer.php');

?>

