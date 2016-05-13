<?php

namespace googleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Datauser
 *
 * @ORM\Table(name="datauser")
 * @ORM\Entity(repositoryClass="googleBundle\Repository\DatauserRepository")
 */
class Datauser
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
     * @ORM\Column(name="utilisateur", type="integer")
     */
    private $utilisateur;

    /**
     * @var int
     *
     * @ORM\Column(name="nbiti", type="integer", nullable=true)
     */
    private $nbiti;


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
     * Set utilisateur
     *
     * @param integer $utilisateur
     * @return Datauser
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

    /**
     * Set nbiti
     *
     * @param integer $nbiti
     * @return Datauser
     */
    public function setNbiti($nbiti)
    {
        $this->nbiti = $nbiti;

        return $this;
    }

    /**
     * Get nbiti
     *
     * @return integer 
     */
    public function getNbiti()
    {
        return $this->nbiti;
    }
}
