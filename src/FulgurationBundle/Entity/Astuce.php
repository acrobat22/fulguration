<?php

namespace FulgurationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Astuce
 */
class Astuce
{
    public function __toString()
    {
        return $this->nom;
    }

    //*****************************//
    //     GENERATED CODE          //
    //*****************************//

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var boolean
     */
    private $actif;

    /**
     * @var \DateTime
     */
    private $dateCreate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $enfant;

    /**
     * @var \FulgurationBundle\Entity\Astuce
     */
    private $parent;

    /**
     * @var \FulgurationBundle\Entity\CategoriePlateforme
     */
    private $categorie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enfant = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Astuce
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Astuce
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     *
     * @return Astuce
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return Astuce
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * Get dateCreate
     *
     * @return \DateTime
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * Add enfant
     *
     * @param \FulgurationBundle\Entity\Astuce $enfant
     *
     * @return Astuce
     */
    public function addEnfant(\FulgurationBundle\Entity\Astuce $enfant)
    {
        $this->enfant[] = $enfant;

        return $this;
    }

    /**
     * Remove enfant
     *
     * @param \FulgurationBundle\Entity\Astuce $enfant
     */
    public function removeEnfant(\FulgurationBundle\Entity\Astuce $enfant)
    {
        $this->enfant->removeElement($enfant);
    }

    /**
     * Get enfant
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnfant()
    {
        return $this->enfant;
    }

    /**
     * Set parent
     *
     * @param \FulgurationBundle\Entity\Astuce $parent
     *
     * @return Astuce
     */
    public function setParent(\FulgurationBundle\Entity\Astuce $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \FulgurationBundle\Entity\Astuce
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set categorie
     *
     * @param \FulgurationBundle\Entity\CategoriePlateforme $categorie
     *
     * @return Astuce
     */
    public function setCategorie(\FulgurationBundle\Entity\CategoriePlateforme $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \FulgurationBundle\Entity\CategoriePlateforme
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
