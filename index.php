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
            <ul>
            <li class="form-name, line1">タスク名　：　タスク内容　：　記載時間</li>
            </ul>
            <?php if ($records): ?>
                <ul>
                <?php foreach ($records as $record): ?>
                    <?php   $tasks_title = $record['tasks_title'];
                            $tasks_content = $record['tasks_content'];
                            $tasks_time = $record['created_at'];?>
                        <li class="line1"><?php echo htmlspecialchars($tasks_title, ENT_QUOTES, 'UTF-8') ?> :
                            <?php echo htmlspecialchars($tasks_content, ENT_QUOTES, 'UTF-8') ?> :
                            <?php echo $tasks_time ?> :
                            <div class="line1">
		                        <form action="delete.php" method="post" >
	                        	    <input type="submit" value="削除する" class="button1">
                	        	    <input type="hidden" name="id" value="<?=$record['id']?>">
                    		    </form>
                    		</div>
                    		</li>
                <?php endforeach ?>
                </ul>
            <?php endif ?>
            <div class="register">
                <input type="button" onclick="location.href='input.php'"value="タスクを登録する" >
            </div>
        </div>
        <div class"footer">
            
        </div>
    
    </body>
</html>