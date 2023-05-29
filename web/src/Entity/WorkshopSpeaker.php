<?php

namespace App\Entity;

use App\Repository\WorkshopSpeakerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkshopSpeakerRepository::class)]
class WorkshopSpeaker
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'workshopSpeakers')]
    private ?Workshop $workshop = null;

    #[ORM\ManyToOne(inversedBy: 'workshopSpeakers')]
    private ?Speaker $speaker = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorkshop(): ?Workshop
    {
        return $this->workshop;
    }

    public function setWorkshop(?Workshop $workshop): self
    {
        $this->workshop = $workshop;

        return $this;
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
}
