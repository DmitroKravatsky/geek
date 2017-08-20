<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


</head>

<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo '/site/create' ?>">Create task</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo '/site/sort?word=name' ?>">Sort by name</a></li>
            <li><a href="<?php echo '/site/sort?word=email' ?>">Sort by email</a></li>
            <li><a href="<?php echo '/site/sort?word=status' ?>">Sort by status</a></li>
        </ul>
    </div>
</nav>

        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">
                    <form action="/../auth/login" method ="post" name ="auth" >
                        <h3>Welcome back</h3>
                        <?php if(isset($warning)): ?>
                        <h4><?php echo $warning ?> </h4>
                        <?php endif;?>
                        <input type="text" name="userName" class="form-control input-sm chat-input" placeholder="username" />
                        </br>
                        <input type="text" name="userPassword" class="form-control input-sm chat-input" placeholder="password" />
                        </br>
                        <div class="wrapper">
                    <span class="group-btn">
                        <button type="submit" class="btn btn-default" >login</button>
                    </span>
                        </div>
                    </form>
                </div>

            </div>
        </div>



<?//php endif; ?>

<?php //echo "/../auth/login" ?>
<!-- /.container -->

<!-- Footer -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>

<?php




