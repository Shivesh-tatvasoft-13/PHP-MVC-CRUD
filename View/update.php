<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC CRUD - Update Form</title>
</head>

<body>

    <h2>User Update Form</h2>
    <form action="index.php?controller=user&action=update&id=<?php echo $entries['id'] ?>" method="post">
        <fieldset>
            <legend>Personal information:</legend>
            First name:<br>
            <input type="text" name="firstname" value="<?php echo $entries["firstname"]; ?>">
            <input type="hidden" name="id" value="<?php echo $entries['id']; ?>">
            <br>
            Last name:<br>
            <input type="text" name="lastname" value="<?php echo $entries["lastname"]; ?>">
            <br>
            Email:<br>
            <input type="email" name="email" value="<?php echo $entries["email"]; ?>">
            <br>
            Password:<br>
            <input type="password" name="password" value="<?php echo $entries["password"]; ?>">
            <br>
            Gender:<br>
            <input type="radio" name="gender" value="Male" <?php if ($entries["gender"] == 'Male') {
                                                                echo "checked";
                                                            } ?>>Male

            <input type="radio" name="gender" value="Female" <?php if ($entries["gender"] == 'Female') {
                                                                    echo "checked";
                                                                } ?>>Female
            <br><br>
            Select image to upload:
                <input type="file" name="image" id="fileToUpload"  value="<?php echo $entries["uploadedFiles"]; ?>">
                <input type="submit" name="submit" value="Upload Image">
                
                <br>
                <br>
            <input type="submit" value="update" name="update">
        </fieldset>
    </form>

</body>

</html>