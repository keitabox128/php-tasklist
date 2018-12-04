<?php require_once('database.php');

     if ($_POST['tasks_title'] && $_POST['tasks_content']) {
        // 実行するSQLを作成
        //var_dump($_POST);
        $sql = 'INSERT INTO tasklist.tasks (tasks_title, tasks_content) VALUES(:tasks_title, :tasks_content)';
        // ユーザ入力に依存するSQLを実行するので、セキュリティ対策をする
        $statement = $database->prepare($sql);
        // ユーザ入力データ($_POST['book_title'])をVALUES(?)の?の部分に代入する
        $statement->bindParam(':tasks_title', $_POST['tasks_title']);
        $statement->bindParam(':tasks_content', $_POST['tasks_content']);
        // SQL文を実行する
        $statement->execute();
        // ステートメントを破棄する
        $statement = null;
    }

        // 実行するSQLを作成
    $sql = 'SELECT * FROM tasklist.tasks ORDER BY created_at DESC';
    
    // SQLを実行する
    $statement = $database->query($sql);
    
    
    // 結果レコード（ステートメントオブジェクト）を配列に変換する
    $records = $statement->fetchAll();

    // ステートメントを破棄する
    $statement = null;
    // MySQLを使った処理が終わると、接続は不要なので切断する
    $database = null;



?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        
        <title>タスクマネジメント</title>
        <!--<link rel="stylesheet" type="text/css" href="/task_management/CSS/style.css">-->
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
            <table class ="table table-striped">
                <tr>
                    <th>タスク名</th>
                    <th>タスク内容</th>
                    <th>記載時間</th>
                    <th></th>
                </tr>
            <?php if ($records): ?>
                <tr>
                <?php foreach ($records as $record): ?>
                    <tr>
                    <?php   $tasks_title = $record['tasks_title'];
                            $tasks_content = $record['tasks_content'];
                            $tasks_time = $record['created_at'];?>
                        <td><?php echo htmlspecialchars($tasks_title, ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?php echo htmlspecialchars($tasks_content, ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?php echo $tasks_time ?></td>
                        <td>
		                        <form action="delete.php" method="post" >
	                        	    <button type="submit"  class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span>
	                        	    &nbsp;削除する</button>
                	        	    <input type="hidden" name="id" value="<?=$record['id']?>">
                    		    </form>
                    	</td>
                    </tr>
                <?php endforeach ?>
                </tr>
            <?php endif ?>
            </table>
            <div class="register">
                <button class="btn btn-default btn-block" onclick="location.href='input.php'" type ="button">
                    <span class="glyphicon glyphicon-pencil"></span>
                    &nbsp;タスクを登録する</button>
            </div>
        </div>
        <div class"footer">
            
        </div>
    
    </body>
</html>