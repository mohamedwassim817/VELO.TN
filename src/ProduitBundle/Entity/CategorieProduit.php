<?php

namespace ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieProduit
 *
 * @ORM\Table(name="categorie_produit")
 * @ORM\Entity(repositoryClass="ProduitBundle\Repository\CategorieProduitRepository")
 */
class CategorieProduit
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
     * @ORM\Column(name="nom_categorie", type="string", length=255)
     */
    private $nomCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="type_categorie", type="string", length=255)
     */
    private $typeCategorie;


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
     * Set nomCategorie
     *
     * @param string $nomCategorie
     *
     * @return CategorieProduit
     */
    public function setNomCategorie($nomCategorie)
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }

    /**
     * Get nomCategorie
     *
     * @return string
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }

    /**
     * Set typeCategorie
     *
     * @param string $typeCategorie
     *
     * @return CategorieProduit
     */
    public function setTypeCategorie($typeCategorie)
    {
        $this->typeCategorie = $typeCategorie;

        return $this;
    }

    /**
     * Get typeCategorie
     *
     * @return string
     */
    public function getTypeCategorie()
    {
        return $this->typeCategorie;
    }
}

