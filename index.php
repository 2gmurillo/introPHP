<?php
require_once('../data.php');
// require_once __DIR__ . "./data.php";
// echo "<script>console.log('Jobs: " . $jobs . "' );</script>";
// echo "<script>console.log('Projects: " . $projects . "' );</script>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../app/assets/static/icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <title>CV Juango</title>
    <link rel="stylesheet" href="../app/assets/styles/style.css">
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="navbar">
                <div class="navbar__brand"><?= $brand ?></div>
                <div class="navbar__menu">
                    <ul>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#perfil">Perfil</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <main class="main">
            <section id="contact" class="contact">
                <div class="overlay">
                    <div class="contact__container">
                        <div class="contact__data">
                            <div class="contact__data--container">
                                <h2><?= $name ?></h2>
                                <h3><?= $profession ?></h3>
                                <ul>
                                    <li> <?php echo "Email: $email" ?> </li>
                                    <li> <?php echo "Phone: $phone" ?> </li>
                                    <li> <?php echo "LinkedIn: $linkedin" ?> </li>
                                    <li> <?php echo "Location: $location" ?> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="contact__image">
                            <div class="contact__image--container">
                                <img src=<?= $profilePicture ?> alt=<?= $name ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="perfil" class="perfil">
                <div class="overlay">
                    <div class="perfil__container">
                        <div class="perfil__title">
                            <h2>Perfil</h2>
                        </div>
                        <div class="perfil__description">
                            <p> <?= $profileDescription ?> </p>
                        </div>
                        <div class="perfil__experience">
                            <?php printArray($jobs); ?>
                        </div>
                    </div>
                </div>
            </section>
            <section id="projects" class="projects">
                <div class="overlay">
                    <div class="projects__container">
                        <div class="projects__title">
                            <h2>Projects</h2>
                        </div>
                        <div class="projects__experience">
                            <?php foreach ($projects as $project) { ?>
                                <?php if ($project->visible == false) {
                                    continue;
                                } ?>
                                <div class="card2">
                                    <div class="card2__image">
                                        <img src=<?php echo '../app/assets/static/' . $project->picture ?> alt="">
                                    </div>
                                    <div class="card2__description">
                                        <div class="card2__description--container">
                                            <h3><?= $project->title ?></h3>
                                            <p><?= $project->company ?></p>
                                            <button class="btn">Ver</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- <footer class="footer">
            Footer
        </footer> -->
    </div>
</body>

</html>