<?php

namespace App\Controllers;

use App\Models\{Project};

class ProjectsController
{
    public function getAddProjectAction()
    {
        if (!empty($_POST)) {
            $project = new Project();
            $project->company = $_POST['company'];
            $project->title = $_POST['title'];
            $project->picture = $_POST['picture'];
            $project->save();
        }
        include_once '../views/addProject.php';
    }
}
