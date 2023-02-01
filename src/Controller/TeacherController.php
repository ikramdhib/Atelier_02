<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\StudentController;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
   


    #[Route('/teacher/{name}', name: 'app_teacher')]
    public function showTeacher($name) : Response {
        #return new Response('Bonjour'.$name);
        return $this->render('teacher/showTeacher.html.twig', [
            'name' =>$name,
        ]);
    }

    #[Route('/teachers',name:'app_tech')]
    public function goToIndex() : Response{

        return $this->redirectToRoute('app_student');

    }
}
