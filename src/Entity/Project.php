<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $siteLink = null;

    #[ORM\Column(length: 255)]
    private ?string $figmaLink = null;

    #[ORM\Column(length: 255)]
    private ?string $gitLink = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    // Propriété virtuelle non persistée (virtuelle car pas [ORM\Column......])
    // Juste propriété de l'objet "Project"
    private ?string $formattedDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getSiteLink(): ?string
    {
        return $this->siteLink;
    }

    public function setSiteLink(string $siteLink): static
    {
        $this->siteLink = $siteLink;
        return $this;
    }

    public function getFigmaLink(): ?string
    {
        return $this->figmaLink;
    }

    public function setFigmaLink(string $figmaLink): static
    {
        $this->figmaLink = $figmaLink;
        return $this;
    }

    public function getGitLink(): ?string
    {
        return $this->gitLink;
    }

    public function setGitLink(string $gitLink): static
    {
        $this->gitLink = $gitLink;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * Méthode pour obtenir la date formatée
     */
    public function getFormattedDate(): ?string
    {
        return $this->formattedDate;
    }

    /**
     * Méthode pour définir la date formatée
     */
    public function setFormattedDate(string $formattedDate): static
    {
        $this->formattedDate = $formattedDate;
        return $this;
    }
}
