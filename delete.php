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
    //$sql = 'DELETE FROM tasklist.tasks WHERE id ='.$id;
    $sql = 'DELETE FROM tasklist.tasks WHERE id = :id';
    $stmt = $database->prepare($sql);
       
        //プリペアステートメント実行
        //print $sql;
        $stmt->bindParam(':id',$id);
        
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
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
         <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!--横幅が狭い時に出るハンバーガーボタン-->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                
                    <!--ホームページ戻るリンク-->
                    <a class="navbar-brand" href="index.php">タスク管理表</a>
                </div>
                    <!--メニュー項目-->
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-right">
                    <li><a href="input.php" class="header-register">タスクを登録する</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main">
            <h1 style="text-align: center;">削除しました。</h1>
            <br>
            <div class="text-center">
                <button  onclick="location.href='index.php'" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;タスクリストに戻る</button>
            </div>        
        </div>
    </body>
</html>