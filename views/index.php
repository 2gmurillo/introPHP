<?php function printArray($array)
{ ?>
    <?php foreach ($array as $job) { ?>
        <?php if ($job->visible == false) {
            continue;
        } ?>
        <div class="card">
            <div class="card__image">
                <img src=<?php echo './assets/static/' . $job->picture ?> alt=<?= $job->picture ?> />
            </div>
            <div class="card__description">
                <h3><?= $job->title ?></h3>
                <p><?= $job->company ?></p>
            </div>
            <div class="card__details">
                <h3><?= $job->getDurationAsString(); ?></h3>
                <h4>Funciones:</h4>
                <ul>
                    <li><?= $job->function1 ?></li>
                    <li><?= $job->function2 ?></li>
                    <li><?= $job->function3 ?></li>
                </ul>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/static/icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/styles/style.css" />
    <title>CV Juango</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="navbar">
                <div class="navbar__brand"><?= $brand ?></div>
                <div class="navbar__menu">
                    <ul>
                        <li><a href="/introPHP/#contact">Contact</a></li>
                        <li><a href="/introPHP/#perfil">Perfil</a></li>
                        <li><a href="/introPHP/#projects">Projects</a></li>
                        <li><a href="/introPHP/job/add">addJob</a></li>
                        <li><a href="/introPHP/project/add">addProject</a></li>
                        <li><a href="/introPHP/#">Login</a></li>
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
                                <img src=<?= $profilePicture ?> alt=<?= $name ?> />
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
                                        <img src=<?php echo './assets/static/' . $project->picture ?> alt=<?= $project->picture ?> />
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