<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Contract</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <?php include ("form_process.php")?>



</head>
<body>

<header>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Contract List</a></li>
                <li class="active"><a href="addContract.php">Add Contract</a></li>
            </ul>
        </div>
    </nav>
</header>
<?php read_csv("contract_data.csv") ?>
<form class="form-group form-h" action= "<?=$_SERVER['PHP_SELF']; ?>" method="POST">
    <div class = "container">
        <h3 align="left">Contract Form</h3>
        <h6 align="left"><font color="red">*required field</font></h6>
        <fieldset>
        <div class="form-group">
            <label>Title<font color="#ff0010">*</font>:</label>
            <input class="form-control" type = "text" placeholder="Please enter a title for this contract" name ="title" value="<?= $title ?>" autofocus>
            <span class="error"><?= $title_error ?></span>
        </div>
        </fieldset>

        <div class="form-group">
            <label>First Name<font color="#ff0010">*</font>:</label>
            <input class="form-control" type = "text" placeholder="John" name ="fname" value="<?= $fname ?>">
            <span class="error"><?= $fname_error ?></span>
        </div>
        <div class="form-group">
            <label>Last Name<font color="#ff0010">*</font>:</label>
            <input class="form-control" type = "text" placeholder="Doe" name ="lname" value="<?= $lname ?>">
            <span class="error"><?= $lname_error ?></span>
        </div>
        <div class="form-group">
            <label>email:</label>
            <input class="form-control" type = "text" placeholder="example@email.com" name = "email" value="<?= $email ?>">
            <span class="error"><?= $email_error ?></span>
        </div>
        <div class="form-group">
            <label>Website:</label>
            <input class="form-control" type = "text" placeholder="example.com" name = "website" value="<?= $website ?>">
            <span class="error"><?= $website_error ?></span>
        </div>
        <div class="form-group">
            <label>Cell Phone Number:</label>
            <input class="form-control" type = "text" placeholder="4161112222" name = "cPhoneNum" value="<?= $cPhoneNum ?>">
            <span class="error"><?= $phoneNum_error ?></span>
        </div>
        <div class="form-group">
            <label>Home Phone Number:</label>
            <input class="form-control" type = "text" placeholder="4161112222" name = "hPhoneNum" value="<?= $hPhoneNum?>">
            <span class="error"><?= $phoneNum_error ?></span>
        </div>
        <div class="form-group">
            <label>Office Phone Number:</label>
            <input class="form-control" type = "text" placeholder="4161112222" name = "oPhoneNum" value="<?= $oPhoneNum ?>">
            <span class="error"><?= $phoneNum_error ?></span>
        </div>
        <div class="form-group">
            <label>Twitter URL:</label>
            <input class="form-control" type = "text" placeholder="https://..." name = "tweet" value="<?= $twitter ?>">
            <span class="error"><?= $url_error ?></span>
        </div>
        <div class="form-group">
            <label>Facebook URL:</label>
            <input class="form-control" type = "text" placeholder="https://..." name = "fbook" value="<?= $facebook ?>">
            <span class="error"><?= $url_error ?></span>
        </div>
        <form enctype="multipart/form-data">
        <div class="form-group">
            <label>Add Image:</label>
            <input type="file" id="file-1" class="file" name="image">
            <span class="error"><php? $image_erros ?></span>
        </div>
        </form>

        <div class="form-group">
            <label>Comment:</label>
            <textarea class="form-control" rows="4" id="comment" name="comment" placeholder="Please Enter Comment Here...."><?= $comment ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary pull-right" name="submit">Add Contract</button>
            <h3 class="success" align="center"><?= $message ?></h3>
        </div>
    </div>
</form >


</body>
</html>
