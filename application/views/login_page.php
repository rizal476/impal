<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/welcome_css.css">
</head>
<body>
    <div style="height: 100vh">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-2 side"></div>
                <div class="col-10">
                    <div class="row h-100">
                        <div class="col-6 mx-auto d-flex justify-content-center align-items-center">
                            <div class="login-form d-flex justify-content-center align-items-center">
                                <form method="post" action="<?php echo base_url()?>ControllerLogin/aksiLogin" class="">
                                    <div>
                                        <input class="user-form" type="text" name="username" placeholder="Username">
                                    </div>
                                    <div style="margin-top:60px;">
                                        <input class="pass-form" type="text" name="password" placeholder="Password">
                                    </div>
                                    <div style="margin-top:10px;" class="container-login100-form-btn d-flex justify-content-center align-items-center">
                                        <button class="login-btn">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>