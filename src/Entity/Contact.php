<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
    * @Assert\NotBlank(message="Merci de renseigner votre nom")
    * @Assert\Length(max="100", maxMessage="Votre nom doit comporter {{ limit }} caractères maximum")
    */
    private $name;

    /**
     * @Assert\NotBlank(message="Merci de renseigner votre adresse mail")
     * @Assert\Email(message="Le mail {{ value }} n'est pas valide. Veuillez saisir une adresse mail valide")
     */
    private $email;

    /**
     * @Assert\NotBlank(message="N'avez-vous rien à me dire ?")
     * @Assert\Length(max="255", maxMessage="Votre message doit comporter {{ limit }} caractères maximum")
     */
    private $message;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }
}
