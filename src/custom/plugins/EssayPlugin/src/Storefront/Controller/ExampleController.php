<?php declare(strict_types=1);

namespace EssayPlugin\Storefront\Controller;

use EssayPlugin\Service\OrderService;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(defaults: ['_routeScope' => ['storefront']])]
class ExampleController extends StorefrontController
{
    private OrderService $orderService;

    public function __construct
    (
        OrderService $orderService
    ){
        $this->orderService = $orderService;
    }

    #[Route(
        path: '/example',
        name: 'frontend.example.example',
        methods: ['GET']
    )]
    public function showExample(Request $request, SalesChannelContext $context): Response
    {
        return $this->renderStorefront('@EssayPlugin/storefront/page/example.html.twig', [
            'example' => 'Hello world'
        ]);
    }

    #[Route(
        path: '/orders/customer',
        name:'frontend.orders.customer' ,
        methods: ['GET']
    )]
    public function customerOrders(SalesChannelContext $context):Response
    {
        $customer = $context->getCustomer();
        $channelId= $customer->get("salesChannelId");
        $orders = $this->orderService->customerOrders($channelId , $context->getContext());

        return $this->renderStorefront('@EssayPlugin/storefront/page/example.html.twig', [
            'orders' => gettype($orders->getElements())
        ]);
    }

    #[Route(
        path: '/logos',
        name: 'frontend.logo.logo',
        methods: ['GET']
    )]
    public function logo():Response
    {
        return $this->renderStorefront('@EssayPlugin/storefront/layout/header/logo.html.twig',[
                "text" => "Hello World"
            ]);
    }
}
