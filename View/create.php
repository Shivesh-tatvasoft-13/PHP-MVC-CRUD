<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_MVC_CRUD</title>
</head>

<body>
    <h2>Registration Form</h2>
    <a href="index.php?controller=users&action=read">User's List</a>
    <br>
    <br>

    <form action="index.php?controller=users&action=create" method="POST">
        <fieldset>
            <legend>Information:</legend>
            First name:<br>
            <input type="text" name="firstname" required>
            <br>
            Last name:<br>
            <input type="text" name="lastname" required>
            <br>
            Email:<br>
            <input type="email" name="email" required>
            <br>
            Password:<br>
            <input type="password" name="password" required>
            <br>
            Gender:<br>
            <input type="radio" name="gender" value="Male" required>Male
            <input type="radio" name="gender" value="Female" required>Female
            <br>
            <br>

            <form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
            <br>
            <br>
            <input type="submit" name="submit" value="submit">
        </fieldset>
    </form>

</body>

</html>