<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{

    public function homepage()
    {
        return new Response('Hi huuuuu');
    }

    /**
     * @Route("/q/{slug}")
     */
    public function show($slug)
    {
        return $this->render('q/show.html.twig', [
            'q' => ucwords(str_replace('-', '', $slug))
        ]);
    }
}