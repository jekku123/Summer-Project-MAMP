<?php

namespace App\Entity;

use App\Repository\SpeakerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpeakerRepository::class)]
class Speaker
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $firstname = null;

    #[ORM\Column(length: 30)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bio = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $organization = null;

    #[ORM\ManyToOne(inversedBy: 'speakers')]
    private ?Conference $conference = null;

    #[ORM\ManyToOne(inversedBy: 'speakers')]
    private ?Seminar $seminar = null;

    #[ORM\OneToMany(mappedBy: 'speaker', targetEntity: SessionSpeaker::class)]
    private Collection $sessionSpeakers;

    #[ORM\OneToMany(mappedBy: 'speaker', targetEntity: WorkshopSpeaker::class)]
    private Collection $workshopSpeakers;

    public function __construct()
    {
        $this->sessionSpeakers = new ArrayCollection();
        $this->workshopSpeakers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    public function setOrganization(?string $organization): self
    {
        $this->organization = $organization;

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
            $sessionSpeaker->setSpeaker($this);
        }

        return $this;
    }

    public function removeSessionSpeaker(SessionSpeaker $sessionSpeaker): self
    {
        if ($this->sessionSpeakers->removeElement($sessionSpeaker)) {
            // set the owning side to null (unless already changed)
            if ($sessionSpeaker->getSpeaker() === $this) {
                $sessionSpeaker->setSpeaker(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, WorkshopSpeaker>
     */
    public function getWorkshopSpeakers(): Collection
    {
        return $this->workshopSpeakers;
    }

    public function addWorkshopSpeaker(WorkshopSpeaker $workshopSpeaker): self
    {
        if (!$this->workshopSpeakers->contains($workshopSpeaker)) {
            $this->workshopSpeakers->add($workshopSpeaker);
            $workshopSpeaker->setSpeaker($this);
        }

        return $this;
    }

    public function removeWorkshopSpeaker(WorkshopSpeaker $workshopSpeaker): self
    {
        if ($this->workshopSpeakers->removeElement($workshopSpeaker)) {
            // set the owning side to null (unless already changed)
            if ($workshopSpeaker->getSpeaker() === $this) {
                $workshopSpeaker->setSpeaker(null);
            }
        }

        return $this;
    }
}
