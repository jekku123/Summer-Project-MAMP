<?php

namespace App\Entity;

use App\Repository\SessionSpeakerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionSpeakerRepository::class)]
class SessionSpeaker
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'sessionSpeakers')]
    private ?Speaker $speaker = null;

    #[ORM\ManyToOne(inversedBy: 'sessionSpeakers')]
    private ?Session $session = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpeaker(): ?Speaker
    {
        return $this->speaker;
    }

    public function setSpeaker(?Speaker $speaker): self
    {
        $this->speaker = $speaker;

        return $this;
    }

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): self
    {
        $this->session = $session;

        return $this;
    }
}