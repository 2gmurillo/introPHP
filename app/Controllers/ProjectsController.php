<?php

namespace App\Controllers;

use App\Models\{Project};

class ProjectsController extends BaseController
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
        return $this->renderHTML('addProject.twig');
    }
}
