<?php
//文字化け解消
header("Content-type: text/html; charset=utf-8");

//database呼び出し
require_once("database.php");

//idがあるか判定
if(empty($_POST)){
    echo "<a href='index.php'>タスクリストに戻る</a>";
    exit();
}else{


//数値判定
        $id_string = $_POST['id'];

        $id = (int)$id_string;

  
    //SQL文：プリペアステートメント
    $sql = 'DELETE FROM tasklist.tasks WHERE id ='.$id;
    $stmt = $database->prepare($sql);
       
        //プリペアステートメント実行
        //print $sql;

       
        $stmt->execute();

        //変更された行の数が1かどうか
        //if($stmt->rowCount() == 1){
        //    echo "削除しました。";
        //}else{
        //    echo "削除失敗です";
        //}

        
        //ステートメント切断
        $stmt->null;
        
    
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>タスクマネジメント</title>
        <link rel="stylesheet" type="text/css" href="/task_management/CSS/style.css">
    </head>
    <body>
        <div class="header">
            <div class="header-logo">タスク管理表</div>
            <div class"menu">
                <a href="input.php" class="header-register">タスクを登録する</a>
            </div>
        </div>
        <div class="main">
            <h1 class="comment">削除しました。</h1>
            <div class="button-return">
                <input type="button" onclick="location.href='index.php'"value="タスクリストに戻る"  >
            </div>        
        </div>
    </body>
</html>