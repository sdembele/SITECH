<?php

namespace BackendBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\ClasseTherapeutique")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classetherapeutique;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;


    /**
     * @var string
     *
     * @ORM\Column(name="principe_actif", type="string", length=255, nullable=true)
     */
    private $principeActif;

    /**
     * @var string
     *
     * @ORM\Column(name="excipient", type="text", nullable=true)
     */
    private $excipient;

    /**
     * @var string
     *
     * @ORM\Column(name="mode_administration", type="string", length=255, nullable=true)
     */
    private $modeAdministration;

    /**
     * @var string
     *
     * @ORM\Column(name="possologie", type="text", nullable=true)
     */
    private $possologie;

    /**
     * @var string
     *
     * @ORM\Column(name="aspect", type="string", length=255, nullable=true)
     */
    private $aspect;

    /**
     * @var int
     *
     * @ORM\Column(name="limite_commande", type="integer", nullable=true)
     */
    private $limiteCommande;

    /**
     * @ORM\OneToOne(targetEntity="BackendBundle\Entity\ImageArticle", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;


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
     * @return Article
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
     * Set principeActif
     *
     * @param string $principeActif
     *
     * @return Article
     */
    public function setPrincipeActif($principeActif)
    {
        $this->principeActif = $principeActif;

        return $this;
    }

    /**
     * Get principeActif
     *
     * @return string
     */
    public function getPrincipeActif()
    {
        return $this->principeActif;
    }

    /**
     * Set excipient
     *
     * @param string $excipient
     *
     * @return Article
     */
    public function setExcipient($excipient)
    {
        $this->excipient = $excipient;

        return $this;
    }

    /**
     * Get excipient
     *
     * @return string
     */
    public function getExcipient()
    {
        return $this->excipient;
    }

    /**
     * Set modeAdministration
     *
     * @param string $modeAdministration
     *
     * @return Article
     */
    public function setModeAdministration($modeAdministration)
    {
        $this->modeAdministration = $modeAdministration;

        return $this;
    }

    /**
     * Get modeAdministration
     *
     * @return string
     */
    public function getModeAdministration()
    {
        return $this->modeAdministration;
    }

    /**
     * Set possologie
     *
     * @param string $possologie
     *
     * @return Article
     */
    public function setPossologie($possologie)
    {
        $this->possologie = $possologie;

        return $this;
    }

    /**
     * Get possologie
     *
     * @return string
     */
    public function getPossologie()
    {
        return $this->possologie;
    }

    /**
     * Set aspect
     *
     * @param string $aspect
     *
     * @return Article
     */
    public function setAspect($aspect)
    {
        $this->aspect = $aspect;

        return $this;
    }

    /**
     * Get aspect
     *
     * @return string
     */
    public function getAspect()
    {
        return $this->aspect;
    }

    /**
     * Set limiteCommande
     *
     * @param integer $limiteCommande
     *
     * @return Article
     */
    public function setLimiteCommande($limiteCommande)
    {
        $this->limiteCommande = $limiteCommande;

        return $this;
    }

    /**
     * Get limiteCommande
     *
     * @return int
     */
    public function getLimiteCommande()
    {
        return $this->limiteCommande;
    }

    

    /**
     * Set image
     *
     * @param \BackendBundle\Entity\ImageArticle $image
     *
     * @return Article
     */
    public function setImage(\BackendBundle\Entity\ImageArticle $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \BackendBundle\Entity\ImageArticle
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set classetherapeutique
     *
     * @param \BackendBundle\Entity\ClasseTherapeutique $classetherapeutique
     *
     * @return Article
     */
    public function setClassetherapeutique(\BackendBundle\Entity\ClasseTherapeutique $classetherapeutique)
    {
        $this->classetherapeutique = $classetherapeutique;

        return $this;
    }

    /**
     * Get classetherapeutique
     *
     * @return \BackendBundle\Entity\ClasseTherapeutique
     */
    public function getClassetherapeutique()
    {
        return $this->classetherapeutique;
    }

    public function __construct()
    {
        //$this->classetherapeutique = new ArrayCollection();
    }

    public function addClassetherapeutique(ClasseTherapeutique $classeTherapeutique)
    {

    }

}
