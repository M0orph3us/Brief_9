<?php

namespace App\Entity;

use App\Repository\FinesRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: FinesRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_ID_NUMBERS', fields: ['id_numbers'])]
#[ApiResource]
class Fines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 12)]
    private ?string $id_numbers = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 50)]
    private ?string $firstname = null;

    #[ORM\Column(length: 50)]
    private ?string $lastname = null;

    #[ORM\ManyToOne(inversedBy: 'fines_paid')]
    private ?Users $users = null;

    #[ORM\Column]
    private ?bool $Paid = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdNumbers(): ?string
    {
        return $this->id_numbers;
    }

    public function setIdNumbers(string $id_numbers): static
    {
        $this->id_numbers = $id_numbers;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }

    public function isPaid(): ?bool
    {
        return $this->Paid;
    }

    public function setPaid(bool $Paid): static
    {
        $this->Paid = $Paid;

        return $this;
    }
}
