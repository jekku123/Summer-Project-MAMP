<?php

namespace App\Entity;

use App\Repository\ExhibitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ExhibitionRepository::class)]
class Exhibition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups(['event:read'])]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['event:read'])]
    private ?string $description = null;

    #[ORM\Column(length: 100)]
    #[Groups(['event:read'])]
    private ?string $location = null;

    #[ORM\Column]
    #[Groups(['event:read'])]
    private ?\DateTimeImmutable $start_at = null;

    #[ORM\Column]
    #[Groups(['event:read'])]
    private ?\DateTimeImmutable $end_at = null;

    #[ORM\OneToMany(mappedBy: 'exhibition', targetEntity: Booth::class)]
    #[Groups(['event:read'])]
    private Collection $booths;

    #[ORM\ManyToOne(inversedBy: 'exhibitions')]
    #[Groups(['event:read'])]
    private ?Event $event = null;

    public function __toString(): string
    {
        return $this->title;
    }

    public function __construct()
    {
        $this->booths = new ArrayCollection();
    }

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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->start_at;
    }

    public function setStartAt(\DateTimeImmutable $start_at): self
    {
        $this->start_at = $start_at;

        return $this;
    }

    public function getEndAt(): ?\DateTimeImmutable
    {
        return $this->end_at;
    }

    public function setEndAt(\DateTimeImmutable $end_at): self
    {
        $this->end_at = $end_at;

        return $this;
    }

    /**
     * @return Collection<int, Booth>
     */
    public function getBooths(): Collection
    {
        return $this->booths;
    }

    public function addBooth(Booth $booth): self
    {
        if (!$this->booths->contains($booth)) {
            $this->booths->add($booth);
            $booth->setExhibition($this);
        }

        return $this;
    }

    public function removeBooth(Booth $booth): self
    {
        if ($this->booths->removeElement($booth)) {
            // set the owning side to null (unless already changed)
            if ($booth->getExhibition() === $this) {
                $booth->setExhibition(null);
            }
        }

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }
}
