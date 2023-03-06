<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $usernamr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    private ?Classroom $idclassroom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsernamr(): ?string
    {
        return $this->usernamr;
    }

    public function setUsernamr(string $usernamr): self
    {
        $this->usernamr = $usernamr;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIdclassroom(): ?classroom
    {
        return $this->idclassroom;
    }

    public function setIdclassroom(?classroom $idclassroom): self
    {
        $this->idclassroom = $idclassroom;

        return $this;
    }
}
