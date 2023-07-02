<?php
// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\Task;
use App\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TaskController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function new(Request $request): Response
    {
        // создаёт объект задачи и инициализирует некоторые данные для этого примера
        $task = new Task();

        $form = $this->createForm(TaskType::class, $task);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // но изначальная переменная `$task` также была обновлена
            $task = $form->getData();

            // ... выполните какое-то действие, например сохраните задачу в базу данных
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();
            dd($form);
//            return $this->redirectToRoute('task_success');
        }

        return $this->render('task/new.html.twig', [
            'form' => $form,
        ]);

    }
}
