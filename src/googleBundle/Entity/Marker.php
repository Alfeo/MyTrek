<?php

namespace googleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marker
 *
 * @ORM\Table(name="marker")
 * @ORM\Entity(repositoryClass="googleBundle\Repository\MarkerRepository")
 */
class Marker
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="longitude", type="decimal", scale=7)
     */
    private $longitude;

    /**
     * @var int
     *
     * @ORM\Column(name="latitude", type="decimal", scale=7)
     */
    private $latitude;

    /**
     * @var int
     *
     * @ORM\Column(name="utilisateur", type="integer")
     */
    private $utilisateur;


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
     * Set name
     *
     * @param string $name
     * @return Marker
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set longitude
     *
     * @param integer $longitude
     * @return Marker
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return integer 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param integer $latitude
     * @return Marker
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return integer 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set utilisateur
     *
     * @param integer $longitude
     * @return Marker
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return integer 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
