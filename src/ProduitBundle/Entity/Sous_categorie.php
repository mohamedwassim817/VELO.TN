<?php

namespace ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
/**
 * sous_categorie
 *
 * @ORM\Table(name="sous_categorie")
 * @ORM\Entity(repositoryClass="ProduitBundle\Repository\sous_categorieRepository")
 */
class Sous_categorie
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
     * @ORM\Column(name="nom_sousCat", type="string", length=255)
     */
    private $nomSousCat;

    /**
     * @var string
     *
     * @ORM\Column(name="type_sous_Cat", type="string", length=255)
     */
    private $typeSousCat;
    /**

     * @ORM\ManyToOne(targetEntity="CategorieProduit")
     * @ORM\JoinColumn(referencedColumnName="id")
     */

    private $id_sc;


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
     * Set nomSousCat
     *
     * @param string $nomSousCat
     *
     * @return sous_categorie
     */
    public function setNomSousCat($nomSousCat)
    {
        $this->nomSousCat = $nomSousCat;

        return $this;
    }

    /**
     * Get nomSousCat
     *
     * @return string
     */
    public function getNomSousCat()
    {
        return $this->nomSousCat;
    }

    /**
     * Set typeSousCat
     *
     * @param string $typeSousCat
     *
     * @return sous_categorie
     */
    public function setTypeSousCat($typeSousCat)
    {
        $this->typeSousCat = $typeSousCat;

        return $this;
    }

    /**
     * Get typeSousCat
     *
     * @return string
     */
    public function getTypeSousCat()
    {
        return $this->typeSousCat;
    }

    /**
     * @return mixed
     */
    public function getIdSc()
    {
        return $this->id_sc;
    }

    /**
     * @param mixed $id_sc
     */
    public function setIdSc($id_sc)
    {
        $this->id_sc = $id_sc;
    }

}

