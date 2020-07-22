<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="L'image doit comporter un nom")
     * @Assert\Length(max="255", maxMessage="Le nom de l'image doit comporter {{ limit }} caractères maximum")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idProject;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIdProject(): ?Project
    {
        return $this->idProject;
    }

    public function setIdProject(?Project $idProject): self
    {
        $this->idProject = $idProject;

        return $this;
    }
}
