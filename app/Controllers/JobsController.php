<?php

namespace App\Controllers;

use App\Models\{Job};
use Respect\Validation\Validator as v;

class JobsController extends BaseController
{
    public function getAddJobAction($request)
    {
        $responseMessage = null;
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $files = $request->getUploadedFiles();
            $picture = $files['picture'];
            if ($picture->getError() == UPLOAD_ERR_OK) {
                $fileName = $picture->getClientFilename();
                $picture->moveTo("../public/assets/static/$fileName");
            }
            $jobValidator = v::key('company', v::stringType()->notEmpty())
                ->key('title', v::stringType()->notEmpty())
                ->key('months', v::numericVal()->notEmpty())
                ->key('function1', v::stringType()->notEmpty())
                ->key('function2', v::stringType()->notEmpty())
                ->key('function3', v::stringType()->notEmpty());

            try {
                $jobValidator->assert($postData);
                $job = new Job();
                $job->company = $postData['company'];
                $job->title = $postData['title'];
                $job->picture = $fileName;
                $job->months = $postData['months'];
                $job->function1 = $postData['function1'];
                $job->function2 = $postData['function2'];
                $job->function3 = $postData['function3'];
                $job->save();
                $responseMessage = '¡Trabajo guardado exitosamente!';
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
        }
        return $this->renderHTML('addJob.twig', [
            'responseMessage' => $responseMessage, 'brand' => 'ADMIN'
        ]);
    }
}
