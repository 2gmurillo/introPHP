<?php

namespace App\Controllers;

use App\Models\{Job};

class JobsController
{
    public function getAddJobAction($request)
    {
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $job = new Job();
            $job->company = $postData['company'];
            $job->title = $postData['title'];
            $job->picture = $postData['picture'];
            $job->months = $postData['months'];
            $job->function1 = $postData['function1'];
            $job->function2 = $postData['function2'];
            $job->function3 = $postData['function3'];
            $job->save();
        }
        include_once '../views/addJob.php';
    }
}
