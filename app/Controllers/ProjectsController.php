<?php

namespace App\Controllers;

use App\Models\{Project};

class ProjectsController
{
    public function getAddProjectAction($request)
    {
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $project = new Project();
            $project->company = $postData['company'];
            $project->title = $postData['title'];
            $project->picture = $postData['picture'];
            $project->save();
        }
        include_once '../views/addProject.php';
    }
}
