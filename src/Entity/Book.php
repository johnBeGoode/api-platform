<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints\Isbn;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
* @ORM\Entity(repositoryClass=BookRepository::class)
*/
#[ApiResource(
    normalizationContext: ['groups' => ['book:read']],
    denormalizationContext:['groups' => ['book:write']]
)]
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"book:read", "book:write"})
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @Groups({"book:read", "book:write"})
     * @Assert\NotBlank()
     * @ORM\Column(type="text")
     */
    private $summary;

    /**
     * @Groups({"book:read", "book:write"})
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @Groups({"book:read", "book:write"})
     * @Assert\Isbn(type = "null")
     * @ORM\Column(type="string", length=255)
     */
    private $isbn;

    /**
     * @Groups({"book:read", "book:write"})
     * @Assert\Type("\DateTimeInterface")
     * @ORM\Column(type="datetime")
     */
    private $publicationDate;

    /**
     * @Groups({"book:read"})
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Groups({"book:read"})
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

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

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

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

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
