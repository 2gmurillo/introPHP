<?php

namespace App\Controllers;

use App\Models\{Job};

class JobsController
{
    public function getAddJobAction()
    {
        if (!empty($_POST)) {
            $job = new Job();
            $job->company = $_POST['company'];
            $job->title = $_POST['title'];
            $job->picture = $_POST['picture'];
            $job->months = $_POST['months'];
            $job->function1 = $_POST['function1'];
            $job->function2 = $_POST['function2'];
            $job->function3 = $_POST['function3'];
            $job->save();
        }
        include_once '../views/addJob.php';
    }
}
