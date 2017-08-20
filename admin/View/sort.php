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
            <a class="navbar-brand" href="<?php echo '/site/index' ?>">TextTask</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo '/site/sort?word=name' ?>">Sort by name</a></li>
            <li><a href="<?php echo '/site/sort?word=email' ?>">Sort by email</a></li>
            <li><a href="<?php echo '/site/sort?word=status' ?>">Sort by status</a></li>
            <li><a href="<?php echo '/auth/login' ?>">Login</a></li>
        </ul>
    </div>
</nav>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">All Tasks
        <small>sorted by <?php echo$condition;?></small>
    </h1>

    <!-- Project One -->
    <?php foreach ($sortedData as $k =>$tasks):?>
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/320х240" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Task :<?php echo $tasks['task'];?></h3>
                <h4>Task was left by <?php echo $tasks['name'];?></h4>
                <h5>My email <?php echo $tasks['email'];?></h5>
                <p><?php echo $tasks['description'];?></p>
                <?php if ($tasks['status']) : ?>
                    <img src="http://www.serviciotecnicoficial.net/wp-content/uploads/2014/04/calidad1.jpg" width="100" height="100">
                <?php endif; ?>
            </div>
        </div>
        <!-- /.row -->

        <hr>
    <?php endforeach;?>

    <!-- Pagination -->
    <!-- Pagination -->
    <ul class="pagination">
        <!--<div class="pagination">-->
        <?php if ($paginator['currentPage'] != 1) : ?>
            <!-- <span class="p_prev"><a href=" " > </span> -->
            <li><a href="<?= $paginator['link'].($paginator['currentPage'] -1);?>">prev</a></li>
        <?php endif; ?>
        <!--<strong><span class="p_prev"><a href="" > </span></strong>-->
        <li><a href="<?= $paginator['link'].$paginator['currentPage'];?> "><?= $paginator['currentPage'];?></a></li>

        <?php if ($paginator['currentPage'] < $paginator['totalPages']) : ?>
            <li><a href="<?= $paginator['link'].($paginator['currentPage'] +1);?>">next</a></li>
        <?php endif; ?>
    </ul>

</div>
<!-- /.container -->

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

</html>

<?php


