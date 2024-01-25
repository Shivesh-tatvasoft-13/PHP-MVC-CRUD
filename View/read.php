<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>MVC CRUD - Read</title>
    <style>
        img{
            width: 100px;
            height: 100px;
        }
    </style>
  
</head>

<body>
    <div class="container">
        <h2>users</h2>
        <a href="index.php?controller=users&action=index">Create new user</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php
                foreach ($entries as $entry) {
              
                ?>
                    <tr>
                        <td><?php echo $entry['id']; ?></td>
                        <td><?php echo $entry['firstname']; ?></td>
                        <td><?php echo $entry['lastname']; ?></td>
                        <td><?php echo $entry['email']; ?></td>
                        <td><?php echo $entry['gender']; ?></td>
                        <td>
                            <?php echo $entry['image']; ?>
                            <img src="upload/<?php echo $entry['image']; ?>" alt=""  name="image"> 
                        <td>
                            <a class="btn btn-success" href="index.php?controller=user&action=update&id=<?php echo $entry["id"] ?>">Edit</a>&nbsp;
                            <a class="btn btn-danger" href="index.php?controller=user&action=delete&id=<?php echo $entry["id"] ?>">Delete</a>
                        </td>
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>