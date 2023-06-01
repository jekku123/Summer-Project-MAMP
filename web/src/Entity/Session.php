<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 100)]
    private ?string $location = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $start_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $end_at = null;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    private ?Conference $conference = null;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    private ?Seminar $seminar = null;

    #[ORM\OneToMany(mappedBy: 'session', targetEntity: SessionSpeaker::class)]
    private Collection $sessionSpeakers;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    public function __construct()
    {
        $this->sessionSpeakers = new ArrayCollection();
    }
    
    public function __toString(): string
    {
        return $this->title;
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

    public function getConference(): ?Conference
    {
        return $this->conference;
    }

    public function setConference(?Conference $conference): self
    {
        $this->conference = $conference;

        return $this;
    }

    public function getSeminar(): ?Seminar
    {
        return $this->seminar;
    }

    public function setSeminar(?Seminar $seminar): self
    {
        $this->seminar = $seminar;

        return $this;
    }

    /**
     * @return Collection<int, SessionSpeaker>
     */
    public function getSessionSpeakers(): Collection
    {
        return $this->sessionSpeakers;
    }

    public function addSessionSpeaker(SessionSpeaker $sessionSpeaker): self
    {
        if (!$this->sessionSpeakers->contains($sessionSpeaker)) {
            $this->sessionSpeakers->add($sessionSpeaker);
            $sessionSpeaker->setSession($this);
        }

        return $this;
    }

    public function removeSessionSpeaker(SessionSpeaker $sessionSpeaker): self
    {
        if ($this->sessionSpeakers->removeElement($sessionSpeaker)) {
            // set the owning side to null (unless already changed)
            if ($sessionSpeaker->getSession() === $this) {
                $sessionSpeaker->setSession(null);
            }
        }

        return $this;
    }
}
