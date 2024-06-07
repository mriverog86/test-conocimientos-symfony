<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Container1Lzvcky\getEmailDomainValidatorService;
use Doctrine\ORM\Mapping as ORM;

use App\Validator\Constraints as AppAssert;

#[ORM\Entity(repositoryClass: UserRepository::class, )]
#[ORM\Table(name: '`user`')]
/**
 * @ORM\Entity ()
 */
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    /**
     * @Assert\
     */
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    #[AppAssert\EmailDomain(domain: "example.com")]
    private ?string $email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
}
