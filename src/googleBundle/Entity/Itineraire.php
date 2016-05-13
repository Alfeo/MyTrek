<?php

namespace googleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itineraire
 *
 * @ORM\Table(name="itineraire")
 * @ORM\Entity(repositoryClass="googleBundle\Repository\ItineraireRepository")
 */
class Itineraire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="markera", type="integer")
     */
    private $markera;

    /**
     * @var int
     *
     * @ORM\Column(name="markerb", type="integer")
     */
    private $markerb;

    /**
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer")
     */
    private $iduser;

    /**
     * @var int
     *
     * @ORM\Column(name="travel", type="integer")
     */
    private $travel;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set markera
     *
     * @param integer $markera
     * @return Itineraire
     */
    public function setMarkera($markera)
    {
        $this->markera = $markera;

        return $this;
    }

    /**
     * Get markera
     *
     * @return integer 
     */
    public function getMarkera()
    {
        return $this->markera;
    }

    /**
     * Set markerb
     *
     * @param integer $markerb
     * @return Itineraire
     */
    public function setMarkerb($markerb)
    {
        $this->markerb = $markerb;

        return $this;
    }

    /**
     * Get markerb
     *
     * @return integer 
     */
    public function getMarkerb()
    {
        return $this->markerb;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     * @return Itineraire
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return integer 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set travel
     *
     * @param integer $travel
     * @return Itineraire
     */
    public function setTravel($travel)
    {
        $this->travel = $travel;

        return $this;
    }

    /**
     * Get travel
     *
     * @return integer 
     */
    public function getTravel()
    {
        return $this->travel;
    }
}
