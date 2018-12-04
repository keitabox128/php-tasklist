<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>タスク管理表</title>
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
        <div>
            <h1>新規タスク登録</h1>
        </div>
        <div class="row">
            <div class="col-xs-6">
            <div class="form-group">
               <form action="index.php" method="post">
                        
                            <p style="font-weight: bold; font-size: 20px;">タスク名:</p> <input type="text" name="tasks_title" class="form-control">
                            <br>
                            <p style="font-weight: bold; font-size: 20px;">タスク内容:</p> <input type="text"name="tasks_content" class="form-control">
	                
	                    <br>
	                    <br>
	                
	                        <button type="submit"  class="btn btn-danger">登録する</button>
                        
                </form> 
            <br>
                <button  onclick="location.href='index.php'" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;タスクリストに戻る</button>
                </div>
            </div>
        </div>
    </body>
</html>