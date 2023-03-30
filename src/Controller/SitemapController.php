<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Hostname;

class SitemapController extends AbstractController
{
    #[Route('/sitemap.xml', name: 'app_sitemap', requirements: [
        '_locale' => 'en|fr',
        '_format' => 'xml',
    ])]
    public function index(Request $request, Hostname $hostname): Response
    {
        $hostname = $request->getSchemeAndHttpHost();

        $urls = [];
        $urls[] = ['loc' => $this->generateUrl('app_home')];
        $urls[] = ['loc' => $this->generateUrl('app_dishes')];
        $urls[] = ['loc' => $this->generateUrl('app_menus')];
        $urls[] = ['loc' => $this->generateUrl('app_galeries')];
        $urls[] = ['loc' => $this->generateUrl('app_chef')];
        $urls[] = ['loc' => $this->generateUrl('app_brigades')];
        $urls[] = ['loc' => $this->generateUrl('app_register')];
        $urls[] = ['loc' => $this->generateUrl('app_login')];
        $urls[] = ['loc' => $this->generateUrl('app_reservations')];

        $response = new Response(
            $this->renderView('sitemap/index.html.twig', [
                'urls' => $urls,
                'hostname' => $hostname,
            ]),
            200
        );

        $response->headers->set('Content-type', 'text/xml');

        return $response;
    }
}
