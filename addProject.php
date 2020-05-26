<?php

use App\Models\{Project};

if (!empty($_POST)) {
    $project = new Project();
    $project->company = $_POST['company'];
    $project->title = $_POST['title'];
    $project->picture = $_POST['picture'];
    $project->save();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../app/assets/static/icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <title>Add Project</title>
    <link rel="stylesheet" href="../app/assets/styles/form.css" />
</head>

<body>
    <div class="container">
        <h1>Add Project</h1>
        <form action="addProject.php" method="POST">
            <input type="text" name="company" id="company" placeholder="Company" />
            <input type="text" name="title" id="title" placeholder="Title" />
            <input type="text" name="picture" id="picture" placeholder="Picture" />
            <button class="btn" type="submit">Save</button>
        </form>
    </div>
</body>

</html>