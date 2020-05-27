<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../assets/static/icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <title>Add Job</title>
    <link rel="stylesheet" href="../assets/styles/form.css" />
</head>

<body>
    <div class="container">
        <h1>Add Job</h1>
        <form action="/introPHP/job/add" method="POST">
            <input type="text" name="company" id="company" placeholder="Company" />
            <input type="text" name="title" id="title" placeholder="Title" />
            <input type="text" name="picture" id="picture" placeholder="Picture" />
            <input type="number" name="months" id="months" placeholder="Months" />
            <input type="text" name="function1" id="function1" placeholder="Function 1" />
            <input type="text" name="function2" id="function2" placeholder="Function 2" />
            <input type="text" name="function3" id="function3" placeholder="Function 3" />
            <button class="btn" type="submit">Save</button>
        </form>
        <a href="/introPHP/" class="btn" type="button">Back</a>
    </div>
</body>

</html>