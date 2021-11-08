<?php

namespace App\Controller;

use App\Repository\SkillRepository;
use OpenApi\Annotations as OA;
use App\Entity\Skill;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SkillsController extends AbstractController
{
    /**
     * @Route("/skills", name="skills", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Returns the rewards of an user",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Skill::class, groups={"full"}))
     *     )
     * )
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
