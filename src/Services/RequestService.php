<?php


namespace App\Services;

use Symfony\Component\HttpFoundation\Request;

class RequestService
{
    /**
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        return $request->request->all();
    }
}