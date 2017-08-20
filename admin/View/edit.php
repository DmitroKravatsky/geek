<?php if(isset($_SESSION['name'])): ?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
            <a class="navbar-brand" href="<?php echo '/admin/index' ?>">TextTask</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo '/../auth/logout' ?>">Logout(<?php echo($_SESSION['name']) ?>)</a></li>
        </ul>
    </div>
</nav>


<div class="container">
    <form action="/../admin/update?id=<?=$data[0]['id']?>" method ="post" name ="task" >
        <div class="form-group">
            <label for="inputsm"> Name</label>
            <input class="form-control input-sm" id="inputsm" type="text" name="name"
                   value="<?php echo $data[0]['name']?>">
        </div>
        <div class="form-group">
            <label for="inputdefault"> Email</label>
            <input class="form-control" id="inputdefault" type="text" name="email"
                   value="<?php echo $data[0]['email']?>">
        </div>
        <div class="form-group">
            <label for="inputdefault">Task</label>
            <input class="form-control" id="inputdefault" type="text"name="task"
                   value="<?php echo $data[0]['task']?>">
        </div>
        <div class="form-group">
            <label for="inputlg">Description of the task</label>
            <input class="form-control input-lg" id="inputlg" type="text" name="description"
                   value="<?php echo $data[0]['description']?>">
        </div>
        <div class="form-group">
            <label for="inputlg">Status of the task</label>
            <input type="checkbox" name="status" value="1">Status<Br>

        </div>
        <button type="submit" class="btn btn-default" >Edit</button>
    </form>
</div>
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
<?php else : echo 'There is no such page' ?>
<?php endif;?>
</html>