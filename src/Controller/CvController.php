<?php


namespace App\Controller;

use App\Services\CvService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cv")
 */
class CvController extends AbstractController
{
    /**
     * @Route("/", name="cv_index", methods={"GET"})
     * @param CvService $cvService
     * @return Response
     */
    public function index(
        CvService $cvService
    ): Response
    {
        $cvService->createCv();

        return $this->render('cv/cv.html.twig');
    }
}