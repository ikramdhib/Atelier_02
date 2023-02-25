<?php

namespace App\Controller;

use App\Entity\Classroom;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassromController extends AbstractController
{
    #[Route('/classrom', name: 'app_classrom')]
    public function index(): Response
    {
        return $this->render('classrom/index.html.twig', [
            'controller_name' => 'ClassromController',
        ]);
    }


    #[Route('/classroom/new', name: 'app_classroms')]
    public function ajouterNewClassroom(Classroom $class , ManagerRegistry $mngr){
       $class1 = new Classroom();

       $class1->setName($class->getName());

       $em =$mngr->getManager();

       $em->persist($class1);

       $em->flush();

       return $this->redirectToRoute('app_classrom');


    }

    #[Route('/classroom', name: 'app_class')]
    public function removeClassroom(ManagerRegistry $mngr, $id){

        $classroom=$mngr->getRepository(Classroom::class)->find($id);

        $em=$mngr->getManager();

        $em->remove($classroom);

        $em->flush();

        return $this->redirectToRoute('app_classroom');

    }


    #[Route('/student', name: 'app_student')]
    public function display(ManagerRegistry $doctrine): Response
    {
        $repo=$doctrine->getRepository(Classroom::class);

        $classrooms=$repo->findAll();

        return $this->render('student/index.html.twig', [
            'classrooms' => $classrooms,
        ]);
    }


    #[Route('/student', name: 'app_editt')]
    public function editClassroom(ManagerRegistry $doctrine , $id): Response
    {
        $repo=$doctrine->getRepository(Student::class);

        $classroom=$repo->find($id);

        

        return $this->redirectToRoute('app_classroom');
    }





}
