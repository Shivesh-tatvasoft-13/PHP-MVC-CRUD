<?php
class usersController
{

    public $Conectar;
    public $Connection;

    public function __construct()
    {

        require_once 'Core/Conectar.php';
        require_once "Model/users.php";

        $this->Conectar = new Conectar();
        $this->Connection = $this->Conectar->Connection();

    }



    public function run($action)
    {
        switch ($action) {
            case "create":
                $this->create();
                break;
            case "read":
                $this->read();
                break;
            case "update":
                $this->update();
                break;
            case "delete":
                $this->delete();
                break;
            default:
                $this->index();
                break;

        }
    }


    /*
     Create the view that we pass to it with the indicated data.
     */
    public function view($visit, $entries)
    {
        
        require_once("View/" . $visit . ".php");


    }

    public function index()
    {
        $this->view("create", null);
    }
    /*
      Create a new users from the POST parameters and reload the create.php.
     */

    public function create()
    {

        if (isset($_POST['submit'])) {

            $users = new users($this->Connection);

            $users->setfirstname($_POST["firstname"]);
            $users->setlastname($_POST["lastname"]);
            $users->setEmail($_POST["email"]);
            $users->setpassword($_POST["password"]);
            $users->setgender($_POST["gender"]);

            $users->create();

        }
        header("location: index.php?controller=users&action=read");

    }


    /* Update users from POST parameters and reload the read.php. */

    public function save()
    {

        $users = new users($this->Connection);
        $id = $users->getById($_GET['id']);

        if (isset($_POST["submit"])) {

            //We update a user
            $users = new users($this->Connection);
       
            $users->setfirstname($_POST["firstname"]);
            $users->setlastname($_POST["lastname"]);
            $users->setEmail($_POST["email"]);
            $users->setpassword($_POST["password"]);
            $users->setgender($_POST["gender"]);

            $users->update();
        }
        header("location: index.php?controller=users&action=read");
    }

    public function update(){
        if (isset($_GET["id"])) {
            //We update a user
            $users = new users($this->Connection);
            $id = $users->getById($_GET["id"]);

            $this->view('update',$id);
        }
        
    }


    /* view users from POST parameters and reload the index.php. */

    public function read()
    {
        $users = new users($this->Connection);
        $readData=$users->read();

        $this->view("read", $readData);
    }


    public function delete(){

        $users = new users($this->Connection);

        $id = $users->getById($_GET["id"]);
        
        $users->deleteById($id['id']);
        header("location: index.php?controller=users&action=read");
    }

}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>