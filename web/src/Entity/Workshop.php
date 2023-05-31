<?php

namespace App\Entity;

use App\Repository\WorkshopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkshopRepository::class)]
class Workshop
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

    #[ORM\ManyToOne(inversedBy: 'workshops')]
    private ?Conference $conference = null;

    #[ORM\OneToMany(mappedBy: 'workshop', targetEntity: WorkshopSpeaker::class)]
    private Collection $workshopSpeakers;

    #[ORM\OneToMany(mappedBy: 'workshop', targetEntity: WorkshopAttendee::class)]
    private Collection $workshopAttendees;

    public function __construct()
    {
        $this->workshopSpeakers = new ArrayCollection();
        $this->workshopAttendees = new ArrayCollection();
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
            $workshopSpeaker->setWorkshop($this);
        }

        return $this;
    }

    public function removeWorkshopSpeaker(WorkshopSpeaker $workshopSpeaker): self
    {
        if ($this->workshopSpeakers->removeElement($workshopSpeaker)) {
            // set the owning side to null (unless already changed)
            if ($workshopSpeaker->getWorkshop() === $this) {
                $workshopSpeaker->setWorkshop(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, WorkshopAttendee>
     */
    public function getWorkshopAttendees(): Collection
    {
        return $this->workshopAttendees;
    }

    public function addWorkshopAttendee(WorkshopAttendee $workshopAttendee): self
    {
        if (!$this->workshopAttendees->contains($workshopAttendee)) {
            $this->workshopAttendees->add($workshopAttendee);
            $workshopAttendee->setWorkshop($this);
        }

        return $this;
    }

    public function removeWorkshopAttendee(WorkshopAttendee $workshopAttendee): self
    {
        if ($this->workshopAttendees->removeElement($workshopAttendee)) {
            // set the owning side to null (unless already changed)
            if ($workshopAttendee->getWorkshop() === $this) {
                $workshopAttendee->setWorkshop(null);
            }
        }

        return $this;
    }
}
