<?php

namespace App\Controller;

use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SkillsController extends AbstractController
{
    /**
     * @Route("/skills", name="skills", methods={"GET"})
     */
    public function index(
        SkillRepository $skillRepository
    )
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SkillsController.php',
            'skills' => $skillRepository->findAll()[0] ? $skillRepository->findAll()[0]->getTitle() : '',
            'qweqew' => 'qweqweqweqwe'
        ]);
    }
}
