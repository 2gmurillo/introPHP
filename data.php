<?php

use App\Models\{Job, Project};

$brand = 'JUANGO';
$name = 'Juan Gonzalo Murillo Muñoz';
$profession = 'Desarrollador Jr.';
$email = '2gmurillo@gmail.com';
$phone = '(+57) 3128216528';
$linkedin = 'www.linkedin.com';
$location = 'Medellín, Colombia';
$profilePicture = './app/assets/static/Juango.png';
$profileDescription = '4 años de experiencia en el campo de la automatización industrial, 4 años desarrollando habilidades y conocimientos que ayudaron a proyectarme y a despertar un gran interés por aprender y aplicar nuevas tecnologías.';

$jobs = Job::all();
$projects = Project::all();
?>

<?php function printArray($array)
{ ?>
    <?php foreach ($array as $job) { ?>
        <?php if ($job->visible == false) {
            continue;
        } ?>
        <div class="card">
            <div class="card__image">
                <img src=<?php echo './app/assets/static/' . $job->picture ?> alt=<?= $job->picture ?> />
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