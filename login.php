<?php include('page_header.php'); ?>

<form action="check.php" method="post">

<table align="center">
<h2>ログイン画面</h2>
<tr><td class="login">ユーザ名：</td><td><input type="text" name="uid" input type="text" ></td></tr>
<tr><td class="login">パスワード：</td><td><input type="password" name="pass" input type="password" ></td></tr>
</table>
<input type="submit" value="送信"><input type="reset" value="取消">
</form>
<?php include('page_footer.php'); ?>
