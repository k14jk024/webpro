<?php
require_once('db_inc.php');

include('page_header.php');//画面出力開始
//上のsql2はVIEW化する。

if ( isset($_SESSION['urole']) and $_SESSION['urole']==1 ) {
	//学生としてログインしているなら
	$uid   = $_SESSION['uid'];
	$uname = $_SESSION['uname']; // 認証済みのユーザ名
}else { // その以外は
	die('エラー：この機能を利用する権限がありません');
}
echo '<h2>成績確認</h2>';
//SELECT uid,sum(credit)as 取得単位 FROM tb_subject natural join tb_gp natural join tb_study

$sql = "SELECT uid,sum(credit)as 取得単位, sum(credit*point ) AS GPA
FROM tb_subject
NATURAL JOIN tb_gp
NATURAL JOIN tb_study
WHERE uid  = '{$uid}'
";

//"SELECT * FROM  WHERE uid  = '{$uid}'";

$rs = mysql_query($sql, $conn);
if (!$rs) {
	die ('エラー: ' . mysql_error());
}
$row = mysql_fetch_array($rs) ;

echo '<table align="center" border=1>';
echo '<tr><th>ユーザID</th><th>名前</th><th>取得単位数</th><th>GPA</th></tr>';
echo '<tr><td>' .strtoupper($uid). '</td>';
echo '<td>' .$uname. '</td>';
echo '<td>' .$row['取得単位']. '</td>'.//echo '<td>' .$row['GPA']. '</td>
 '<td>' .$row['GPA']. '</td></tr>';


echo '</table>';


include('page_footer.php');
?>