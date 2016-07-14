<?php
require_once('db_inc.php');
include('page_header.php');//画面出力開始
if ( isset($_SESSION['urole']) and $_SESSION['urole']==2 ) {
    //教員としてログインしているなら
    $uid   = $_SESSION['uid'];
    $uname = $_SESSION['uname']; // 認証済みのユーザ名
}else { // その以外は
    die('エラー：この機能を利用する権限がありません');
}
echo '<h2>希望集計一覧</h2>';
//SELECT uid,sum(credit)as 取得単位 FROM tb_subject natural join tb_gp natural join tb_study
$courses = array(
    1=>'情報技術応用コース',
    2=>'情報科学総合コース'
    );
$sql = "select cname,count(*) as 希望集計1
from tb_entry natural join tb_course
where cid = 1";
$sql1 = "select cname,count(*) as 希望集計2
from tb_entry natural join tb_course
where cid = 2";


//"SELECT * FROM  WHERE uid  = '{$uid}'";

$rs = mysql_query($sql, $conn);
$rs1 = mysql_query($sql1, $conn);
if (!$rs) {
    die ('エラー: ' . mysql_error());
}else
if (!$rs1){
        die('エラー: ' . mysql_error());
}
$row = mysql_fetch_array($rs) ;
$row1 = mysql_fetch_array($rs1);
echo '<table border=1>';
echo '<tr><th>コース名</th><th>希望集計</th></tr>';
echo '<td>'.$courses[1].'</td>';
echo '<td>' .$row['希望集計1']. '</td></tr>';
echo '<tr><td>'.$courses[2].'</td>';
echo '<td>' .$row1['希望集計2']. '</td></tr>';

//echo '<td>' .$row['取得単位']. '</td>'.//echo '<td>' .$row['GPA']. '</td>
//'</tr>';

//echo '</table>';
//echo '</div>';

//echo        '</div>';
//echo      '<div class="col-xs-3"></div>';
$courses = array(
    1=>'情報技術応用コース',
    2=>'情報科学総合コース'
    );