<?php

namespace App\Entity;

use App\Repository\ConferenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConferenceRepository::class)]
class Conference
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column(length: 255)]
    private ?string $image_url = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $start_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $end_at = null;

    #[ORM\OneToMany(mappedBy: 'conference', targetEntity: ConferenceSpeaker::class)]
    private Collection $conferenceSpeakers;

    #[ORM\OneToMany(mappedBy: 'conference', targetEntity: Session::class)]
    private Collection $sessions;

    #[ORM\OneToMany(mappedBy: 'conference', targetEntity: Exhibition::class)]
    private Collection $exhibitions;

    #[ORM\OneToMany(mappedBy: 'conference', targetEntity: Event::class)]
    private Collection $events;

    #[ORM\OneToMany(mappedBy: 'conference', targetEntity: Attendee::class)]
    private Collection $attendees;

    public function __construct()
    {
        $this->conferenceSpeakers = new ArrayCollection();
        $this->sessions = new ArrayCollection();
        $this->exhibitions = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->attendees = new ArrayCollection();
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

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $image_url): self
    {
        $this->image_url = $image_url;

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
            $conferenceSpeaker->setConference($this);
        }

        return $this;
    }

    public function removeConferenceSpeaker(ConferenceSpeaker $conferenceSpeaker): self
    {
        if ($this->conferenceSpeakers->removeElement($conferenceSpeaker)) {
            // set the owning side to null (unless already changed)
            if ($conferenceSpeaker->getConference() === $this) {
                $conferenceSpeaker->setConference(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions->add($session);
            $session->setConference($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getConference() === $this) {
                $session->setConference(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Exhibition>
     */
    public function getExhibitions(): Collection
    {
        return $this->exhibitions;
    }

    public function addExhibition(Exhibition $exhibition): self
    {
        if (!$this->exhibitions->contains($exhibition)) {
            $this->exhibitions->add($exhibition);
            $exhibition->setConference($this);
        }

        return $this;
    }

    public function removeExhibition(Exhibition $exhibition): self
    {
        if ($this->exhibitions->removeElement($exhibition)) {
            // set the owning side to null (unless already changed)
            if ($exhibition->getConference() === $this) {
                $exhibition->setConference(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setConference($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getConference() === $this) {
                $event->setConference(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Attendee>
     */
    public function getAttendees(): Collection
    {
        return $this->attendees;
    }

    public function addAttendee(Attendee $attendee): self
    {
        if (!$this->attendees->contains($attendee)) {
            $this->attendees->add($attendee);
            $attendee->setConference($this);
        }

        return $this;
    }

    public function removeAttendee(Attendee $attendee): self
    {
        if ($this->attendees->removeElement($attendee)) {
            // set the owning side to null (unless already changed)
            if ($attendee->getConference() === $this) {
                $attendee->setConference(null);
            }
        }

        return $this;
    }
}
