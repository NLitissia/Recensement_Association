<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     * min=5,
     * max=10,
     * minMessage="Il faut plus de 5 caracteres",
     * maxMessage="Il faut moins de 10 caractres"
     * )
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

     /**
     * @Assert\EqualTo(propertyPath="password", message="Le Mot de passe ne sont pas équivalents")
     */
    private $Verificationpassword;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function getVerificationPassword(): ?string
    {
        return $this->Verificationpassword;
    }

    public function setVerificationPassword(string $verificationpassword): self
    {
        $this->Verificationpassword = $verificationpassword;

        return $this;
    }
    public function getRoles(){
        return['ROLE_USER'];
    }
    public function getSalt(){}
    public function eraseCredentials(){}
}
