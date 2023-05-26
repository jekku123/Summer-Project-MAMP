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

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $bio = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $organization = null;

    #[ORM\OneToMany(mappedBy: 'speaker', targetEntity: ConferenceSpeaker::class)]
    private Collection $conferenceSpeakers;

    #[ORM\OneToMany(mappedBy: 'speaker', targetEntity: SessionSpeaker::class)]
    private Collection $sessionSpeakers;

    public function __construct()
    {
        $this->conferenceSpeakers = new ArrayCollection();
        $this->sessionSpeakers = new ArrayCollection();
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

    public function setBio(string $bio): self
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

    /**
     * @return Collection<int, ConferenceSpeaker>
     */
    public function getConferenceSpeakers(): Collection
    {
        return $this->conferenceSpeakers;
    }

    public function addConferenceSpeaker(ConferenceSpeaker $conferenceSpeaker): self
    {
        if (!$this->conferenceSpeakers->contains($conferenceSpeaker)) {
            $this->conferenceSpeakers->add($conferenceSpeaker);
            $conferenceSpeaker->setSpeaker($this);
        }

        return $this;
    }

    public function removeConferenceSpeaker(ConferenceSpeaker $conferenceSpeaker): self
    {
        if ($this->conferenceSpeakers->removeElement($conferenceSpeaker)) {
            // set the owning side to null (unless already changed)
            if ($conferenceSpeaker->getSpeaker() === $this) {
                $conferenceSpeaker->setSpeaker(null);
            }
        }

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
}
