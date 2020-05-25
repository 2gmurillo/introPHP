<?php
$brand = 'JUANGO';
$name = 'Juan Gonzalo Murillo Muñoz';
$profession = 'Desarrollador Jr.';
$email = '2gmurillo@gmail.com';
$phone = '(+57) 3128216528';
$linkedin = 'www.linkedin.com';
$location = 'Medellín, Colombia';
$profilePicture = './app/assets/static/Juango.png';
$profileDescription = '4 años de experiencia en el campo de la automatización industrial, 4 años desarrollando habilidades y conocimientos que ayudaron a proyectarme y a despertar un gran interés por aprender y aplicar nuevas tecnologías.';

require_once('./vendor/autoload.php');

use App\Models\{Job, Project};

$job1 = new Job('Evertec 2020', 'Desarrollador Jr.', './app/assets/static/hacker.jpg', 24);
$job2 = new Job('Ingeneumática 2018', 'Lider de automatización', './app/assets/static/proyectoFEA2.png', 30);
$job3 = new Job('', 'Auxiliar de Producción', './app/assets/static/robot.jpg', 12);

$job1->functions = ['Desing', 'Programming', 'Customer Training'];
$job2->functions = ['Desing', 'Programming', 'Customer Training'];
$job3->functions = ['Desing', 'Programming', 'Customer Training'];

$project1 = new Project('Evertec', 'Planeación', './app/assets/static/creativity.jpg');
$project2 = new Project('Evertec', 'Desarrollo', './app/assets/static/coding.jpg');
$project3 = new Project('Evertec', 'Resultados', './app/assets/static/hexagon.jpg');

$jobs = [
    $job1,
    $job2,
    $job3,
];

$projects = [
    $project1,
    $project2,
    $project3,
];
