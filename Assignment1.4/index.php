<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contract List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <?php include ("form_process.php")?>





</head>
<body>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Contract List</a></li>
                <li><a href="addContract.php">Add Contract</a></li>
            </ul>
            <form class="navbar-form navbar-right" action= "<?=$_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default" name = "search" value="">search</button>
            </form>
        </div>
    </nav>
</header>

<section class="form-h" >
    <form class= "container" action= "<?=$_SERVER['PHP_SELF']; ?>" method="POST">


        <div class="form-group">
            <a href="addContract.php"><input type="button" class="btn btn-primary pull-right" name = "create" value="Create Contract"></a>
            <br>
            <br>
            <br>
        </div>


        <table class="table table-hover table-condensed table-responsive">
            <tr>
                <th><b>First Name</b></th>
                <th><b>Last Name</b></th>
                <th><b>Images</b></th>
                <th><b></b></th>
                <th><b></b></th>
            </tr>
                <?php display_csv("contract_data.csv") ?>

            </tr>
        </table>



     </form>



</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type = "text/javascript" src="contract_script.js"></script>

</body>
</html>