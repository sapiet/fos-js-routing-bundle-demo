<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main", options={"expose"=true})
     * @Template("main/index.html.twig")
     */
    public function index()
    {
        return [];
    }
    /**
     * @Route("/data/{name}", name="data", options={"expose"=true})
     */
    public function data(Request $request, string $name)
    {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : []);

        return new JsonResponse(['who' => sprintf('%s %s', $name, $request->get('lastname'))]);
    }
}
