<?php

namespace App\Controller;

use App\Repository\SkillRepository;
use App\Services\RequestService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SkillsController extends AbstractController
{
    /**
     * @Route("/skills", name="skills_index", methods={"GET"})
     * @param SkillRepository $skillRepository
     * @return JsonResponse
     */
    public function index(
        SkillRepository $skillRepository
    ): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SkillsController.php',
            'skills' => $skillRepository->findAll() ? $skillRepository->findAll() : '',
            'qweqew' => 'qweqweqweqwe'
        ]);
    }

    /**
     * @Route("/skills", name="add_skill", methods={"POST"})
     * @param Request $request
     * @param RequestService $requestService
     */
    public function add(
        Request $request,
        RequestService $requestService
    ) {
        $parameters = $requestService($request);

        dd($parameters);
    }
}
