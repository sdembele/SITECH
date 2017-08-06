<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ClasseTherapeutique
 *
 * @ORM\Table(name="classe_therapeutique")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ClasseTherapeutiqueRepository")
 */
class ClasseTherapeutique
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
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\Pharmacie")
     * @ORM\JoinColumn(nullable=true)
     */
    private $pharmacie;

    /**
     * @ORM\ManyToOne(targetEntity="ClasseTherapeutique", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $classe;


    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="created_by", type="string", length=255)
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="date")
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="last_update_by", type="string", length=255, nullable=true)
     */
    private $lastUpdateBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_update_date", type="date", nullable=true)
     */
    private $lastUpdateDate;


    public function __construct()
    {
        $this->creationDate = new \DateTime();
        //$this->classe = new ArrayCollection();

    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return ClasseTherapeutique
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ClasseTherapeutique
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     *
     * @return ClasseTherapeutique
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return ClasseTherapeutique
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set lastUpdateBy
     *
     * @param string $lastUpdateBy
     *
     * @return ClasseTherapeutique
     */
    public function setLastUpdateBy($lastUpdateBy)
    {
        $this->lastUpdateBy = $lastUpdateBy;

        return $this;
    }

    /**
     * Get lastUpdateBy
     *
     * @return string
     */
    public function getLastUpdateBy()
    {
        return $this->lastUpdateBy;
    }

    /**
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     *
     * @return ClasseTherapeutique
     */
    public function setLastUpdateDate($lastUpdateDate)
    {
        $this->lastUpdateDate = $lastUpdateDate;

        return $this;
    }

    /**
     * Get lastUpdateDate
     *
     * @return \DateTime
     */
    public function getLastUpdateDate()
    {
        return $this->lastUpdateDate;
    }

    /**
     * Set pharmacie
     *
     * @param Pharmacie $pharmacie
     *
     * @return ClasseTherapeutique
     */
    public function setPharmacie(Pharmacie $pharmacie)
    {
        $this->pharmacie = $pharmacie;

        return $this;
    }

    public function addPharmacie(Pharmacie $pharmacie)
    {
        $this->pharmacie[] = $pharmacie;
        return $this;
    }

    public function removePharmacie(Pharmacie $pharmacie)
    {
        $this->pharmacie->removeElement($pharmacie);
    }

    /**
     * Get pharmacie
     *
     * @return Pharmacie
     */
    public function getPharmacie()
    {
        return $this->pharmacie;
    }

    /**
     * Set classe
     *
     * @param \BackendBundle\ClasseTherapeutique $classe
     *
     * @return ClasseTherapeutique
     */
    public function setClasse(\BackendBundle\Entity \ClasseTherapeutique $classe = null)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return ClasseTherapeutique
     */
    public function getClasse()
    {
        return $this->classe;
    }
}
