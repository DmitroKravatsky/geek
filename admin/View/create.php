
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>

<form action= "/../admin/addBook" method ="post" name ="book"  >

    <div class="container">
        <div class="form-group">
    <label for="inputsm">Name</label>
    <input class="form-control input-sm" id="inputsm" type="text" name="name">
  </div>
   <div class="form-group">
    <label for="inputdefault">author(if it isn't single then separate them by , </label>
    <input class="form-control" id="inputdefault" type="text" name="email">
  </div>
    <div class="form-group">
        <label for="inputdefault">short description</label>
        <input class="form-control" id="inputdefault" type="text"name="task">
    </div>
  <div class="form-group">
    <label for="inputlg">price</label>
    <input class="form-control input-lg" id="inputlg" type="text" name="description">
  </div>
        <div class="form-group">
            <input type="checkbox" name="genres" checked>
        </div>
        <button type="submit" class="btn btn-default" >Send</button>
    </div>
</form>

<button type="button" class="btn btn-info btn-lg" id="modal" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Trigger the modal with a button -->





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
<script src="/../../web/js.js"></script>

</body>

</html>