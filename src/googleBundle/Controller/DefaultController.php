<?php

namespace googleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use googleBundle\Entity\Marker;
use googleBundle\Entity\Datauser;
use googleBundle\Entity\Itineraire;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();

    	$markers = $em->getRepository('googleBundle:Marker')->findAll();

        return $this->render('googleBundle:Default:index.html.twig', array(
            'markers' => $markers,
        ));
    }

    public function addMarkerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();

        $nom = $request->request->get('markerName');
        $longitude = $request->request->get('longitude');
        $latitude = $request->request->get('latitude');

        $marker = new marker();
        $marker->setName($nom);
        $marker->setLongitude($longitude);
        $marker->setLatitude($latitude);
        $marker->setUtilisateur($user->getId());

        $em->persist($marker);
        $em->flush();

        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Nouveau Marker !');

        $url = $this->generateUrl('user_dashboard');
        $response = new RedirectResponse($url);

        return $response;
    }

    public function dashboardItiAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();

        $datauser = $em->getRepository('googleBundle:Datauser')->findOneByUtilisateur($user->getId());

       	$nbiti = $datauser->getNbiti() + 1;
       	$datauser->setNbiti($nbiti);
       	$em->persist($datauser);
        $em->flush();

        $checkMarker1 = $request->request->get('begin');
        $checkMarker2 = $request->request->get('end');
        $itineraire = $request->request->get('itineraire');
        $travel = $request->request->get('travel');

        if ($itineraire == 0)
        {
            $marker1 = $em->getRepository('googleBundle:Marker')->findOneByName($checkMarker1);
            $marker2 = $em->getRepository('googleBundle:Marker')->findOneByName($checkMarker2);

            $newiti = new itineraire();
            $newiti->setMarkera($marker1->getId());
            $newiti->setMarkerb($marker2->getId());
            $newiti->setIduser($user->getId());
            $newiti->setTravel($travel);
            $em->persist($newiti);
            $em->flush();   

            $json_string = file_get_contents("http://api.openweathermap.org/data/2.5/weather?lat=".$marker1->getLatitude()."&lon=".$marker1->getLongitude()."&appid=8c2fdac062162df018b561aa1f6d8f3b&mode=json");
            $jsonData = json_decode($json_string, true);

            $state1 = $jsonData['weather'][0]['main'];

            $json_string = file_get_contents("http://api.openweathermap.org/data/2.5/weather?lat=".$marker2->getLatitude()."&lon=".$marker2->getLongitude()."&appid=8c2fdac062162df018b561aa1f6d8f3b&mode=json");
            $jsonData = json_decode($json_string, true);

            $state2 = $jsonData['weather'][0]['main'];

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Nouvel Itinéraire !');
        }

        else
        {
            $thisIti = $em->getRepository('googleBundle:Itineraire')->findOneById($itineraire);
            $marker1 = $em->getRepository('googleBundle:Marker')->findOneById($thisIti->getMarkera());
            $marker2 = $em->getRepository('googleBundle:Marker')->findOneById($thisIti->getMarkerb());

            $json_string = file_get_contents("http://api.openweathermap.org/data/2.5/weather?lat=".$marker1->getLatitude()."&lon=".$marker1->getLongitude()."&appid=8c2fdac062162df018b561aa1f6d8f3b&mode=json");
            $jsonData = json_decode($json_string, true);

            $state1 = $jsonData['weather'][0]['main'];

            $json_string = file_get_contents("http://api.openweathermap.org/data/2.5/weather?lat=".$marker2->getLatitude()."&lon=".$marker2->getLongitude()."&appid=8c2fdac062162df018b561aa1f6d8f3b&mode=json");
            $jsonData = json_decode($json_string, true);

            $state2 = $jsonData['weather'][0]['main'];

            $travel = $thisIti->getTravel();
        }

        $mymarkers = $em->getRepository('googleBundle:Marker')->findByUtilisateur($user->getId());
        $allMark = count($mymarkers = $em->getRepository('googleBundle:Marker')->findByUtilisateur($user->getId()));
        $allIti = $em->getRepository('googleBundle:Itineraire')->findByIduser($user->getId());

        $myiti = 1;

        return $this->render('googleBundle:Default:profil.html.twig', array(
            'markera' => $marker1,
            'markerb' => $marker2,
            'mymarkers' => $mymarkers,
            'myiti' => $myiti,
            'datauser' => $datauser,
            'allmark' => $allMark,
            'meteoa' => $state1,
            'meteob' => $state2,
            'allIti' => $allIti,
            'travel' => $travel,
        ));
    }
}
