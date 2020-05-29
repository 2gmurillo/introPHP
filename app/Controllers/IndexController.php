<?php

namespace App\Controllers;

use App\Models\{Job, Project};

class IndexController extends BaseController
{
    public function indexAction()
    {
        $jobs = Job::all();
        $projects = Project::all();

        return $this->renderHTML('index.twig', [
            'brand' => 'JUANGO',
            'name' => 'Juan Gonzalo Murillo Muñoz',
            'profession' => 'Desarrollador Jr.',
            'email' => '2gmurillo@gmail.com',
            'phone' => '(+57) 3128216528',
            'linkedin' => 'www.linkedin.com',
            'location' => 'Medellín, Colombia',
            'profilePicture' => './assets/static/Juango.png',
            'profileDescription' => '4 años de experiencia en el campo de la automatización industrial, 4 años desarrollando habilidades y conocimientos que ayudaron a proyectarme y a despertar un gran interés por aprender y aplicar nuevas tecnologías.',
            'jobs' => $jobs,
            'projects' => $projects,
        ]);
    }
}
