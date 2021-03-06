<?php

namespace AppBundle\Controller\Legislatives;

use AppBundle\Entity\LegislativeCandidate;
use AppBundle\Entity\LegislativeDistrictZone;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/", name="legislatives_homepage")
     * @Method("GET")
     */
    public function indexAction(): Response
    {
        return $this->render('legislatives/homepage.html.twig', [
            'candidates' => $this->getDoctrine()->getRepository(LegislativeCandidate::class)->findAllForDirectory(),
            'groupedZones' => $this->getDoctrine()->getRepository(LegislativeDistrictZone::class)->findAllGrouped(),
        ]);
    }
}
