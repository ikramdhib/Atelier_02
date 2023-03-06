<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
   /* #[Route('/student', name: 'app_student')]
    public function index(StudentRepository $repo): Response
    {
       $students =$repo->findAll();

        return $this->render('student/index.html.twig', [
            'students' => $students,
        ]);
    }*/

    #[Route('/student', name: 'app_student')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo=$doctrine->getRepository(Student::class);

        $students=$repo->findAll();

        return $this->render('student/index.html.twig', [
            'students' => $students,
        ]);
    }


    #[Route('/students', name:'app_index')]
    public function index2(): Response{
        return new Response("Bonjour Mes Etudiants");
    } 


    #[Route('/deleteStudent/{id}', name:'app_deleteg')]
    public function deletStudent($id , ManagerRegistry $mngr) {

        $student = $mngr->getRepository(Student::class)->find($id);

        $em=$mngr->getManager();

        $em->remove($student);
        $em->flush();

        return $this->redirectToRoute('app_student');

    }


    #[Route('/adduser', name:'app_adduser')]
    public function addStudent(ManagerRegistry $mngr , Request $req ){

        $student = new Student();
        $form=$this->createForm(StudentType::class,$student);
        $form->handleRequest($req);


        /*$student->setUsernamr("hhkjhk");
        $student->setEmail("koktooo@gmail.com");
        */
            if($form->isSubmitted()){
                    $em=$mngr->getManager();

                    $em->persist($student);
                    $em->flush();
            }
            // return $this->redirectToRoute('app_student');
                
            /*  return $this->renderForm('Student/add.html.twig',[
            'form'=>$form,
                ]);*/


        return $this->render('Student/add.html.twig',[
            'form'=>$form->createView(),
        ]);

    }


}
