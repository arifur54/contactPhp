<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <?php include ("form_process.php")?>
    <?php
     $uId = $_GET['editID'];
     $newArray = edit_contact($uId);
    ?>



</head>
<body>

<header>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Contract List</a></li>
                <li class="active"><a href="UpdateContact.php">Edit Contact</a></li>
            </ul>
        </div>
    </nav>
</header>

<?php read_csv("contract_data.csv") ?>
<form class="form-group form-h" action= "index.php" method="POST">
    <div class = "container">
        <h3 align="left">Contract Form</h3>
        <h6 align="left"><font color="red">*required field</font></h6>
        <fieldset>
            <div class="form-group">
                <label>Title<font color="#ff0010">*</font>:</label>
                <input class="form-control" type = "text" placeholder="Please enter a title for this contract" name ="title" value="<?= $newArray['Title'];?>" autofocus>
                <!--<span class="error"><?= $title_error ?></span> -->
            </div>
        </fieldset>

        <div class="form-group">
            <label>First Name<font color="#ff0010">*</font>:</label>
            <input class="form-control" type = "text" placeholder="John" id="ed_t" name ="fname" value="<?= $newArray['FirstName'] ?>">
            <span class="error"><?= $fname_error ?></span>
        </div>
        <div class="form-group">
            <label>Last Name<font color="#ff0010">*</font>:</label>
            <input class="form-control" type = "text" placeholder="Doe" id="ed_f" name ="lname" value="<?= $newArray['LastName'] ?>">
            <span class="error"><?= $lname_error ?></span>
        </div>
        <div class="form-group">
            <label>email:</label>
            <input class="form-control" type = "text" placeholder="example@email.com" id="ed_l" name = "email" value="<?= $newArray['email'] ?>">
            <span class="error"><?= $email_error ?></span>
        </div>
        <div class="form-group">
            <label>Website:</label>
            <input class="form-control" type = "text" placeholder="example.com" name = "website" value="<?= $newArray['website'] ?>">
            <span class="error"><?= $website_error ?></span>
        </div>
        <div class="form-group">
            <label>Cell Phone Number:</label>
            <input class="form-control" type = "text" placeholder="4161112222" name = "cPhoneNum" value="<?= $newArray['CellPhoneNumber'] ?>">
            <span class="error"><?= $phoneNum_error ?></span>
        </div>
        <div class="form-group">
            <label>Home Phone Number:</label>
            <input class="form-control" type = "text" placeholder="4161112222" name = "hPhoneNum" value="<?= $newArray['HomePhoneNumber']?>">
            <span class="error"><?= $phoneNum_error ?></span>
        </div>
        <div class="form-group">
            <label>Office Phone Number:</label>
            <input class="form-control" type = "text" placeholder="4161112222" name = "oPhoneNum" value="<?= $newArray['OfficePhoneNumber'] ?>">
            <span class="error"><?= $phoneNum_error ?></span>
        </div>
        <div class="form-group">
            <label>Twitter URL:</label>
            <input class="form-control" type = "text" placeholder="https://..." name = "tweet" value="<?= $newArray['twitter'] ?>">
            <span class="error"><?= $url_error ?></span>
        </div>
        <div class="form-group">
            <label>Facebook URL:</label>
            <input class="form-control" type = "text" placeholder="https://..." name = "fbook" value="<?= $newArray['Facebook'] ?>">
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
            <textarea class="form-control" rows="4" id="comment" name="comment" placeholder="Please Enter Comment Here...."><?= $newArray['Comment'] ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary pull-left" name="submit">Save Contact</button>
            <h3 class="success" align="center"><?= $message ?></h3>
        </div>
    </div>
</form >


</body>
</html>>