<?php

namespace Admin\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Admin\UserBundle\Entity\UserRepository")
 */
class User extends  BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Admin\TestBundle\Entity\Diplome",inversedBy="delegues")
     */
    protected $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="PF_EMP_Nom", type="string", length=20, nullable=true)
     */
    protected $pFNom;

    /**
     * @var string
     *
     * @ORM\Column(name="PF_EMP_Prenom", type="string", length=20,  nullable=true)
     */
    protected $pFPrenom;

    /**
     * @var \DateEmb
     *
     * @ORM\Column(name="PF_EMP_DateEmb", type="datetime",  nullable=true)
     */
    protected $pFDateEmb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PF_EMP_DateSortie", type="datetime",  nullable=true)
     */
    protected $pFDateSortie;

    /**
     * @var string
     *
     * @ORM\Column(name="PF_EMP_Tel", type="string", length=20,  nullable=true)
     */
    protected $pFTel;

    /**
     * @var string
     *
     * @ORM\Column(name="PF_EMP_Commentaire", type="string", length=256,  nullable=true)
     */
    protected $pFCommentaire;



    /**
     * @var string
     *
     * @ORM\Column(name="PF_EMP_Orant_Option", type="string", length=256,  nullable=true)
     */
    protected $pFOrantOption;

    /**
     * @var string
     *
     * @ORM\Column(name="PF_EMP_Etat", type="boolean", length=20,  nullable=true)
     */
    protected $pFEtat;

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
     * @param string|null $salt
     */
    public function setSalt($salt)
    {
    }// TODO: Implement se

    /**
     * Set pFNom
     *
     * @param string $pFNom
     *
     * @return User
     */
    public function setPFNom($pFNom)
    {
        $this->pFNom = $pFNom;

        return $this;
    }

    /**
     * Get pFNom
     *
     * @return string
     */
    public function getPFNom()
    {
        return $this->pFNom;
    }

    /**
     * Set pFPrenom
     *
     * @param string $pFPrenom
     *
     * @return User
     */
    public function setPFPrenom($pFPrenom)
    {
        $this->pFPrenom = $pFPrenom;

        return $this;
    }

    /**
     * Get pFPrenom
     *
     * @return string
     */
    public function getPFPrenom()
    {
        return $this->pFPrenom;
    }

    /**
     * Set pFDateEmb
     *
     * @param \DateTime $pFDateEmb
     *
     * @return User
     */
    public function setPFDateEmb($pFDateEmb)
    {
        $this->pFDateEmb = $pFDateEmb;

        return $this;
    }

    /**
     * Get pFDateEmb
     *
     * @return \DateTime
     */
    public function getPFDateEmb()
    {
        return $this->pFDateEmb;
    }

    /**
     * Set pFDateSortie
     *
     * @param \DateTime $pFDateSortie
     *
     * @return User
     */
    public function setPFDateSortie($pFDateSortie)
    {
        $this->pFDateSortie = $pFDateSortie;

        return $this;
    }

    /**
     * Get pFDateSortie
     *
     * @return \DateTime
     */
    public function getPFDateSortie()
    {
        return $this->pFDateSortie;
    }

    /**
     * Set pFTel
     *
     * @param string $pFTel
     *
     * @return User
     */
    public function setPFTel($pFTel)
    {
        $this->pFTel = $pFTel;

        return $this;
    }

    /**
     * Get pFTel
     *
     * @return string
     */
    public function getPFTel()
    {
        return $this->pFTel;
    }

   
    /**
     * Set pFCommentaire
     *
     * @param string $pFCommentaire
     *
     * @return User
     */
    public function setPFCommentaire($pFCommentaire)
    {
        $this->pFCommentaire = $pFCommentaire;

        return $this;
    }

    /**
     * Get pFCommentaire
     *
     * @return string
     */
    public function getPFCommentaire()
    {
        return $this->pFCommentaire;
    }

    /**
     * Set pFOrantOption
     *
     * @param string $pFOrantOption
     *
     * @return User
     */
    public function setPFOrantOption($pFOrantOption)
    {
        $this->pFOrantOption = $pFOrantOption;

        return $this;
    }

    /**
     * Get pFOrantOption
     *
     * @return string
     */
    public function getPFOrantOption()
    {
        return $this->pFOrantOption;
    }

    /**
     * Set pFEtat
     *
     * @param boolean $pFEtat
     *
     * @return User
     */
    public function setPFEtat($pFEtat)
    {
        $this->pFEtat = $pFEtat;

        return $this;
    }

    /**
     * Get pFEtat
     *
     * @return boolean
     */
    public function getPFEtat()
    {
        return $this->pFEtat;
    }

    /**
     * Set diplome
     *
     * @param \Admin\TestBundle\Entity\Diplome $diplome
     *
     * @return User
     */
    public function setDiplome(\Admin\TestBundle\Entity\Diplome $diplome = null)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return \Admin\TestBundle\Entity\Diplome
     */
    public function getDiplome()
    {
        return $this->diplome;
    }
}
