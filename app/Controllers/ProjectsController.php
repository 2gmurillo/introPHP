<?php

namespace App\Controllers;

use App\Models\{Project};
use Respect\Validation\Validator as v;

class ProjectsController extends BaseController
{
    public function getAddProjectAction($request)
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
            $projectValidator = v::key('company', v::stringType()->notEmpty())
                ->key('title', v::stringType()->notEmpty());

            try {
                $projectValidator->assert($postData);
                $project = new Project();
                $project->company = $postData['company'];
                $project->title = $postData['title'];
                $project->picture = $fileName;
                $project->save();
                $responseMessage = '¡Proyecto guardado exitosamente!';
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
        }
        return $this->renderHTML('addProject.twig', [
            'responseMessage' => $responseMessage, 'brand' => 'ADMIN'
        ]);
    }
}
