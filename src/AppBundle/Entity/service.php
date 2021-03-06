<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\serviceRepository")
 */
class service
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\employe", mappedBy="service", cascade={"persist", "remove", "merge"})
     */
    private $employe;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return service
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
     * Constructor
     */
    public function __construct()
    {
        $this->employe = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add employe
     *
     * @param \AppBundle\Entity\employe $employe
     *
     * @return service
     */
    public function addEmploye(\AppBundle\Entity\employe $employe)
    {
        $this->employe[] = $employe;

        return $this;
    }

    /**
     * Remove employe
     *
     * @param \AppBundle\Entity\employe $employe
     */
    public function removeEmploye(\AppBundle\Entity\employe $employe)
    {
        $this->employe->removeElement($employe);
    }

    /**
     * Get employe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmploye()
    {
        return $this->employe;
    }
}
