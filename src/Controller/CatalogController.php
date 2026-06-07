<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CatalogController extends AbstractController
{
    public function catalog(): Response
    {
        return new Response('ux-blocks-extended catalog');
    }
}
