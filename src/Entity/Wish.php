<?php

namespace App\Entity;

use App\Repository\WishRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=WishRepository::class)
 */
class Wish
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Le champ ne peut pas être vide")
     * @Assert\Length(max=250, min=2, maxMessage="Vous ne pouvez pas dépasser 250 caractères.", minMessage="vous ne pouvez pas avoir moins de 2 caracètres.")
     * @ORM\Column(type="string", length=250)
     */
    private $title;

    /**
     * @Assert\Length(max=500, maxMessage="Vous ne pouvez pas dépasser 500 caractères")
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @Assert\NotBlank(message="Le champ ne peut pas être vide")
     * @Assert\Length(max=50, maxMessage="Vous ne pouvez pas dépasser 50 caractères.", min=2,  minMessage="vous ne pouvez pas avoir moins de 2 caracètres.")
     * @ORM\Column(type="string", length=50)
     */
    private $author;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPubliched;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="wish")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getIsPubliched(): ?bool
    {
        return $this->isPubliched;
    }

    public function setIsPubliched(bool $isPubliched): self
    {
        $this->isPubliched = $isPubliched;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

}
