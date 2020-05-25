<?php
require_once('./data.php');
?>
<?php function printArray($array)
{ ?>
    <?php foreach ($array as $element) { ?>
        <?php if ($element->visible == false) {
            continue;
        } ?>
        <div class="card">
            <div class="card__image">
                <img src=<?= $element->picture ?> alt="">
            </div>
            <div class="card__description">
                <h3><?= $element->title ?></h3>
                <p><?= $element->getCompany() ?></p>
            </div>
            <div class="card__details">
                <h3><?= $element->getDurationAsString(); ?></h3>
                <h4>Funciones:</h4>
                <ul>
                    <?php foreach ($element->functions as $function) { ?>
                        <li><?= $function ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
<?php } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/static/icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <title>CV Juango</title>
    <link rel="stylesheet" href="./app/assets/styles/style.css">
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="navbar">
                <div class="navbar__brand"><?= $brand ?></div>
                <div class="navbar__menu">
                    <ul>
                        <li>Contact</li>
                        <li>About</li>
                        <li>Projects</li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </header>
        <main class="main">
            <section class="hero">
                <div class="overlay">
                    <div class="hero__container">
                        <div class="hero__data">
                            <div class="hero__data--container">
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
                        <div class="hero__image">
                            <div class="hero__image--container">
                                <img src=<?= $profilePicture ?> alt=<?= $name ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="perfil">
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
            <section class="projects">
                <div class="overlay">
                    <div class="projects__container">
                        <div class="projects__title">
                            <h2>Projects</h2>
                        </div>
                        <div class="projects__experience">
                            <?php foreach ($projects as $element) { ?>
                                <?php if ($element->visible == false) {
                                    continue;
                                } ?>
                                <div class="card2">
                                    <div class="card2__image">
                                        <img src=<?= $element->picture ?> alt="">
                                    </div>
                                    <div class="card2__description">
                                        <div class="card2__description--container">
                                            <h3><?= $element->title ?></h3>
                                            <p><?= $element->getCompany() ?></p>
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