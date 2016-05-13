<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use googleBundle\Entity\Datauser;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    public function dashboardAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();

        $datauser = $em->getRepository('googleBundle:Datauser')->findOneByUtilisateur($user->getId());
        $allMark = count($mymarkers = $em->getRepository('googleBundle:Marker')->findByUtilisateur($user->getId()));

        $myiti = 0;
        $mymarkers = $em->getRepository('googleBundle:Marker')->findByUtilisateur($user->getId());
        $allIti = $em->getRepository('googleBundle:Itineraire')->findByIduser($user->getId());

        return $this->render('googleBundle:Default:profil.html.twig', array(
            'mymarkers' => $mymarkers,
            'myiti' => $myiti,
            'datauser' => $datauser,
            'allmark' => $allMark,
            'allIti' => $allIti, 
        ));
    }
}
