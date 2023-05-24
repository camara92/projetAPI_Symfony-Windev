<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\ORM\Mapping as ORM;

// #[ORM\Entity(repositoryClass: RegionRepository::class)]
class Region
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    private ?int $id = null;

    // #[ORM\Column(length: 255)]
    private ?string $code = null;

    // #[ORM\Column(length: 255)]
    private ?string $nom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
