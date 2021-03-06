<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ContenuConte
 *
 * @ORM\Table(name="contenu_conte")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContenuConteRepository")
 */
class ContenuConte
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
     * @ORM\Column(name="situation_initiale", type="text", nullable=true)
     *
     * @Assert\NotBlank(message="La situation initiale ne doit pas être vide")
     */
    private $situationInitiale;

    /**
     * @var string
     *
     * @ORM\Column(name="element_declencheur", type="text", nullable=true)
     */
    private $elementDeclencheur;

    /**
     * @var string
     *
     * @ORM\Column(name="peripetie", type="text", nullable=true)
     */
    private $peripetie;

    /**
     * @var string
     *
     * @ORM\Column(name="denouement", type="text", nullable=true)
     */
    private $denouement;

    /**
     * @var string
     *
     * @ORM\Column(name="situation_finale", type="text", nullable=true)
     */
    private $situationFinale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modification", type="datetime")
     */
    private $date_modification;

    /**
     * @var Titre
     *
     * -- contraintes de validation
     * @Assert\Valid()
     * @Assert\Type(type="AppBundle\Entity\Titre")
     *
     * -- liaison unidirectionnelle entre conte et produit
     *
     * @ORM\OneToOne(targetEntity="Titre")
     */
    private $titre;

    public function __construct()
    {
        $this->date_modification = new \DateTime('NOW');
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
     * Set situationInitiale
     *
     * @param string $situationInitiale
     *
     * @return ContenuConte
     */
    public function setSituationInitiale($situationInitiale)
    {
        $this->situationInitiale = $situationInitiale;

        return $this;
    }

    /**
     * Get situationInitiale
     *
     * @return string
     */
    public function getSituationInitiale()
    {
        return $this->situationInitiale;
    }

    /**
     * Set elementDeclencheur
     *
     * @param string $elementDeclencheur
     *
     * @return ContenuConte
     */
    public function setElementDeclencheur($elementDeclencheur)
    {
        $this->elementDeclencheur = $elementDeclencheur;

        return $this;
    }

    /**
     * Get elementDeclencheur
     *
     * @return string
     */
    public function getElementDeclencheur()
    {
        return $this->elementDeclencheur;
    }

    /**
     * Set peripetie
     *
     * @param string $peripetie
     *
     * @return ContenuConte
     */
    public function setPeripetie($peripetie)
    {
        $this->peripetie = $peripetie;

        return $this;
    }

    /**
     * Get peripetie
     *
     * @return string
     */
    public function getPeripetie()
    {
        return $this->peripetie;
    }

    /**
     * Set denouement
     *
     * @param string $denouement
     *
     * @return ContenuConte
     */
    public function setDenouement($denouement)
    {
        $this->denouement = $denouement;

        return $this;
    }

    /**
     * Get denouement
     *
     * @return string
     */
    public function getDenouement()
    {
        return $this->denouement;
    }

    /**
     * Set situationFinale
     *
     * @param string $situationFinale
     *
     * @return ContenuConte
     */
    public function setSituationFinale($situationFinale)
    {
        $this->situationFinale = $situationFinale;

        return $this;
    }

    /**
     * Get situationFinale
     *
     * @return string
     */
    public function getSituationFinale()
    {
        return $this->situationFinale;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     *
     * @return ContenuConte
     */
    public function setDateModification($dateModification)
    {
        $this->date_modification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->date_modification;
    }

    /**
     * Set titre
     *
     * @param \AppBundle\Entity\Titre $titre
     *
     * @return ContenuConte
     */
    public function setTitre(\AppBundle\Entity\Titre $titre = null)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return \AppBundle\Entity\Titre
     */
    public function getTitre()
    {
        return $this->titre;
    }
}
