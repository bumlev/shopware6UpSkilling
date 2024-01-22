<?php

namespace LearnerPlugin\StoreFront\Controller;

use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route(defaults: ['_routeScope' => ['storefront']])]

class WorldController extends StorefrontController
{
    #[Route(path: '/hello-world', name: 'frontend.world.world', methods: ['GET'])]
    public function index():Response
    {
        return $this->renderStorefront("@LearnerPlugin/storefront/page/world.html.twig", [
                "example" => "Hello Word"
            ]);
    }
}