<?php
/**
 * Created by PhpStorm.
 * User: Arifur
 * Date: 2017-10-25
 * Time: 7:15 PM
 */


$title_error = $fname_error = $lname_error = $email_error = $website_error = $phoneNum_error = $url_error = "";
$image = array();
$title = $fname = $lname = $email = $website = $cPhoneNum = $hPhoneNum = $oPhoneNum = $twitter = $facebook = $comment = $message = "";
$image_erros = array();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        if (empty($_POST["title"])) {
            $title_error = "Title is Required";
        } else {
            $title = test_input($_POST["title"]);
        }
        if (empty($_POST["fname"])) {
            $fname_error = "First Name is Required";
        } else {
            $fname = test_input($_POST["fname"]);
            if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
                $fname_error = "Only Letters and white Space Allowed";
            }
        }
        if (empty($_POST["lname"])) {
            $lname_error = "Last Name is Required";
        } else {
            $lname = test_input($_POST["lname"]);
            if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
                $lname_error = "Only Letters and white Space Allowed";
            }
        }
        if (empty($_POST["email"])) {
            $email = '';
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = "Invalid email format";
            }
        }
        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                $website_error = "Invalid Website format";
            }
        }
        if (empty($_POST["cPhoneNum"])) {
            $cPhoneNum = "";
        } else {
            $cPhoneNum = test_input($_POST["cPhoneNum"]);
            if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $cPhoneNum)) {
                $phoneNum_error = "Invalid Phone Number";
            }
        }
        if (empty($_POST["hPhoneNum"])) {
            $hPhoneNum = "";
        } else {
            $hPhoneNum = test_input($_POST["hPhoneNum"]);
            if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $hPhoneNum)) {
                $phoneNum_error = "Invalid Phone Number";
            }
        }
        if (empty($_POST["oPhoneNum"])) {
            $oPhoneNum = "";
        } else {
            $oPhoneNum = test_input($_POST["oPhoneNum"]);
            if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $oPhoneNum)) {
                $phoneNum_error = "Invalid Phone Number";
            }
        }
        if (empty($_POST["tweet"])) {
            $twitter = "";
        } else {
            $twitter = test_input($_POST["tweet"]);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $twitter)) {
                $url_error = "Invalid URL";
            }
        }
        if (empty($_POST["fbook"])) {
            $facebook = "";
        } else {
            $facebook = test_input($_POST["fbook"]);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $facebook)) {
                $url_error = "Invalid URL";
            }
        }
        /*if(isset($_FILES['image'], $_POST['file-1'])){
            echo "blah";
            $image_name = $_FILES['image'];
            $image_size = $_FILES['image']['size'];
            $allow_img = array('jpg','jpeg','png','gif');
            $image_ext = strtolower(end(explode('.', $image_name)));
            if(in_array($image_ext, $allow_img) === false){
                $image_erros[] = "File Type Not Allowed";
            }
            if ($image_size > 3145728){
                $image_erros[] = "Maximum file size is 3mb";
            }
            if(!empty($image_erros)){
                foreach ($image_erros as $error){
                    echo $image_erros, "<br />";
                }
            }else{
                //upload the image
            }

        }*/

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = $_POST["comment"];
        }

        if ($title_error == '' && $fname_error == '' && $lname_error == '' && $email_error == '' && $website_error == '' && $phoneNum_error == '' && $url_error == '') {
            contact($title, $fname, $lname, $email, $website, $cPhoneNum, $hPhoneNum, $oPhoneNum, $twitter, $facebook, $comment);
            $title = $fname = $lname = $email = $website = $cPhoneNum = $hPhoneNum = $oPhoneNum = $twitter = $facebook = $comment = "";
            $message = "Your contract has been added!";
        }

    }
}
elseif($_SERVER['REQUEST_METHOD']=='GET'){
	if(!empty($_REQUEST['deleteId'])){
		$delId = $_REQUEST['deleteId'];
		del_contact($delId);	
    }
    if(!empty($_REQUEST['editID'])){
	    $editID = $_REQUEST['editID'];
        edit_ID($editID);
    }


}

function contact($title, $fname, $lname, $email, $website, $cPhoneNum, $hPhoneNum, $oPhoneNum, $twitter, $facebook, $comment){
    $uniqueId = getID();
    $form_data = read_csv("contract_data.csv");
    $form_data[] = array(
        'sr_no' => $uniqueId,
        'Title' => $title,
        'FirstName' => $fname,
        'LastName' => $lname,
        'email' => $email,
        'website' => $website,
        'CellPhoneNumber' => $cPhoneNum,
        'HomePhoneNumber' => $hPhoneNum,
        'OfficePhoneNumber' => $oPhoneNum,
        'twitter' => $twitter,
        'Facebook' => $facebook,
        'Comment' => $comment
    );
    write_csv("contract_data.csv", $form_data);
}



function read_csv($filename){
    $no_rows = array();
    foreach(file($filename, FILE_IGNORE_NEW_LINES) as $newline){
        $no_rows[]=str_getcsv($newline);
    }
    return $no_rows;
}

function  write_csv($filename, $no_rows){
    $file_open = fopen($filename, "w");
    foreach($no_rows as $newRow){
        fputcsv($file_open, $newRow);
    }
    fclose($file_open);
}

function display_csv($filename){
    global $fname;
    global $lname;
    global $image;
    $display_file= fopen($filename, "r");
    while(!feof($display_file)) {
            $content = fgetcsv($display_file);
            for($i =0 ; $i < count($content);$i++){
                $fname=$content[2];
                $lname=$content[3];
				$Id = $content[0];

            }

           HTMLTable($fname, $lname, $Id);

    }
    fclose ($display_file);
}

function HTMLTable($fname, $lname, $Id){
    print("<tr>");
    print("<td>$fname</td>");
    print("<td>$lname</td>");
    print("<td>$Id</td>");
    print("<td><button class='btn btn-danger' type='button' value='Delete' name = 'delete' onclick=loadId({$Id})>Delete</button></td>");
    print("<td><button class='btn btn-info' id='edit-btn' type='button' value='edit' name = 'edit' onclick=\"location . href = 'UpdateContact.php?editID=$Id';\"</button>Edit </td>");
    print("</tr>");
}


/*function storeImage(){
    $image_dir = "images/";
    $type_images = array('jpg','png','jpeg');
    if(is_dir($image_dir)){
        $files= scandir($image_dir);
        for($i = 0; $i < count($files); $i++){
            if($files[$i] !="." && $files[$i] !='..'){
                $file = pathinfo($files[$i]);
            }
        }
    }
}*/

function del_contact($id){
	if($id) 
    {
		$data = read_csv('contract_data.csv');
		$handle = fopen('contract_data.csv', 'w');
		foreach($data as $row) if($id !== $row[0]) fputcsv($handle, $row);
		fclose($handle);
    }
}

function edit_ID($id){
    $uData = getID();


}
function edit_contact($id)
{
    $data = read_csv('contract_data.csv');
    $handle = fopen('contract_data.csv', 'r');
    foreach($data as $row){
        if($id == $row[0]){
            $data = ['sr_no' => $row[0],
                'Title' => $row[1],
                'FirstName' => $row[2],
                'LastName' => $row[3],
                'email' => $row[4],
                'website' => $row[5],
                'CellPhoneNumber' => $row[6],
                'HomePhoneNumber' => $row[7],
                'OfficePhoneNumber' => $row[8],
                'twitter' => $row[9],
                'Facebook' => $row[10],
                'Comment' => $row[11]];

        }
    }
    fclose($handle);
    return $data;
}







function test_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getID()
{
    $file_name = 'ids';
    if(!file_exists($file_name))
    {
        touch($file_name);
        $handle= fopen($file_name, 'r+');
        $id = 0;
    }else
    {
        $handle=fopen($file_name,'r+');
        $id=fread($handle,filesize($file_name));
        settype($id,"integer");
    }
    rewind($handle);
    fwrite($handle,++$id);
    fclose($handle);
    return $id;
}

