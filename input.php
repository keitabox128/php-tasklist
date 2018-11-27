<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>タスク管理表</title>
        <link rel="stylesheet" type="text/css" href="/task_management/CSS/style.css">
    </head>
    <body>
        <div class="header">
            <div class="header-logo">タスク管理表</div>
            <div class"menu">
                <a href="index.php" class="header-register">タスク管理に戻る</a>
            </div>
        </div>
        <div class="main, center">
           <form action="index.php" method="post">
                        
                        <p class="form-name">タスク名:</p> <input type="text" name="tasks_title" class="textbox">
                        <p class="form-name">タスク内容:</p> <input type="text"name="tasks_content" class="textbox">
	                
	                <br>
	                <br>
	                
	                    <input type="submit" value="登録する" class="button1">
                    
            </form> 
        <br>
            <input type="button" onclick="location.href='index.php'"value="タスクリストに戻る" class="register">
        </div>
    </body>
</html>