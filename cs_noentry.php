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
        echo '<h2>コース希望未提出者一覧</h2>';
        $sql = "SELECT uid, uname
FROM tb_user
where urole=1 and uid NOT IN(select uid FROM tb_entry)";

        $rs = mysql_query($sql, $conn);
        if (!$rs) {
            die ('エラー: ' . mysql_error());
        }
        $row = mysql_fetch_array($rs) ;

        echo '<table border=1 align="center"">';
        //echo '<table border=1>';
        echo '<tr><th>'.'ユーザID'.'</th><th>'.'名前'.'</th></tr>';
        $row = mysql_fetch_array($rs) ;
        while($row){
            echo '<td>' .strtoupper($row['uid']). '</td>';
            echo '<td>' .$row['uname']. '</td>';
            echo '</tr>';
            $row = mysql_fetch_array($rs) ;
        }
        echo '</table>';
        echo '</div>';

        echo        '</div>';
        echo        '<div class="col-xs-3"></div>';
        include('page_footer.php');
    //}
//}
?>