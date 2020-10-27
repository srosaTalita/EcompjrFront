<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EcompJr</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel = "stylesheet" type = "text/css" href = "pageLogin/assets/css/style.css">

    </head>

    <body>
        <?php
            session_start(); 
        ?>
            <div class = "container">
                <div class = "box login">
                    
                    <div class = "first-colum">
                        <a href="home.php"><img src="masterPage/assets/img/icon.png" width="120" height="120"></a>     
                            <p class="description"> Welcome Back!</p>
                    </div>
                        <div class = "second-colum">
                        <h2 class = "title">Login to Continue</h2>

                        <form action="/Treinamento2020/user/check" method="post" class="form">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"></span>
                                </div>
                                <input  name="email" placeholder="email" class="form-control input_user"  >
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"></i></span>
                                </div>
                                <input name="password" type="password" class="form-control input_pass"  placeholder="password">
                            </div>
                            <button type="submit" class = "button button-second"> Login </button>        
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>