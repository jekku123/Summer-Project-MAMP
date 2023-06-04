<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiFilter;
use App\Entity\Invite;
use App\Entity\Attendee;
use App\Entity\Exhibition;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Post;
use Doctrine\DBAL\Types\Types;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EventRepository;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

enum EventType: string
{
    case CONFERENCE = 'conference';
    case SEMINAR = 'seminar';
}

#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection()
    ],
    normalizationContext: [
        'groups' => ['event:read']
    ],
    order: ['start_at' => 'DESC'],
    paginationEnabled: false,

)]
#[ApiFilter(SearchFilter::class, properties: ['type' => 'exact'])]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', enumType: EventType::class)]
    #[Groups(['event:read'])]
    private ?EventType $type = null;

    #[ORM\Column(length: 255)]
    #[Groups(['event:read'])]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['event:read'])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Groups(['event:read'])]
    private ?string $location = null;

    #[ORM\Column(length: 255)]
    #[Groups(['event:read'])]
    private ?string $image = null;

    #[ORM\Column]
    #[Groups(['event:read'])]
    private ?\DateTimeImmutable $start_at = null;

    #[ORM\Column]
    #[Groups(['event:read'])]
    private ?\DateTimeImmutable $end_at = null;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Invite::class)]
    private Collection $invites;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Attendee::class)]
    private Collection $attendees;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Exhibition::class)]
    #[Groups(['event:read'])]
    private Collection $exhibitions;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Session::class)]
    #[Groups(['event:read'])]
    private Collection $sessions;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: SideEvent::class)]
    #[Groups(['event:read'])]
    private Collection $sideEvents;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Workshop::class)]
    #[Groups(['event:read'])]
    private Collection $workshops;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Feedback::class)]
    private Collection $feedback;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Speaker::class)]
    #[Groups(['event:read'])]
    private Collection $speakers;

    public function __construct()
    {
        $this->invites = new ArrayCollection();
        $this->attendees = new ArrayCollection();
        $this->exhibitions = new ArrayCollection();
        $this->sessions = new ArrayCollection();
        $this->sideEvents = new ArrayCollection();
        $this->workshops = new ArrayCollection();
        $this->feedback = new ArrayCollection();
        $this->speakers = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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
     * @return Collection<int, Invite>
     */
    public function getInvites(): Collection
    {
        return $this->invites;
    }

    public function addInvite(Invite $invite): self
    {
        if (!$this->invites->contains($invite)) {
            $this->invites->add($invite);
            $invite->setEvent($this);
        }

        return $this;
    }

    public function removeInvite(Invite $invite): self
    {
        if ($this->invites->removeElement($invite)) {
            // set the owning side to null (unless already changed)
            if ($invite->getEvent() === $this) {
                $invite->setEvent(null);
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
            $attendee->setEvent($this);
        }

        return $this;
    }

    public function removeAttendee(Attendee $attendee): self
    {
        if ($this->attendees->removeElement($attendee)) {
            // set the owning side to null (unless already changed)
            if ($attendee->getEvent() === $this) {
                $attendee->setEvent(null);
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
            $exhibition->setEvent($this);
        }

        return $this;
    }

    public function removeExhibition(Exhibition $exhibition): self
    {
        if ($this->exhibitions->removeElement($exhibition)) {
            // set the owning side to null (unless already changed)
            if ($exhibition->getEvent() === $this) {
                $exhibition->setEvent(null);
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
            $session->setEvent($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getEvent() === $this) {
                $session->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SideEvent>
     */
    public function getSideEvents(): Collection
    {
        return $this->sideEvents;
    }

    public function addSideEvent(SideEvent $sideEvent): self
    {
        if (!$this->sideEvents->contains($sideEvent)) {
            $this->sideEvents->add($sideEvent);
            $sideEvent->setEvent($this);
        }

        return $this;
    }

    public function removeSideEvent(SideEvent $sideEvent): self
    {
        if ($this->sideEvents->removeElement($sideEvent)) {
            // set the owning side to null (unless already changed)
            if ($sideEvent->getEvent() === $this) {
                $sideEvent->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Workshop>
     */
    public function getWorkshops(): Collection
    {
        return $this->workshops;
    }

    public function addWorkshop(Workshop $workshop): self
    {
        if (!$this->workshops->contains($workshop)) {
            $this->workshops->add($workshop);
            $workshop->setEvent($this);
        }

        return $this;
    }

    public function removeWorkshop(Workshop $workshop): self
    {
        if ($this->workshops->removeElement($workshop)) {
            // set the owning side to null (unless already changed)
            if ($workshop->getEvent() === $this) {
                $workshop->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Feedback>
     */
    public function getFeedback(): Collection
    {
        return $this->feedback;
    }

    public function addFeedback(Feedback $feedback): self
    {
        if (!$this->feedback->contains($feedback)) {
            $this->feedback->add($feedback);
            $feedback->setEvent($this);
        }

        return $this;
    }

    public function removeFeedback(Feedback $feedback): self
    {
        if ($this->feedback->removeElement($feedback)) {
            // set the owning side to null (unless already changed)
            if ($feedback->getEvent() === $this) {
                $feedback->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Speaker>
     */
    public function getSpeakers(): Collection
    {
        return $this->speakers;
    }

    public function addSpeaker(Speaker $speaker): self
    {
        if (!$this->speakers->contains($speaker)) {
            $this->speakers->add($speaker);
            $speaker->setEvent($this);
        }

        return $this;
    }

    public function removeSpeaker(Speaker $speaker): self
    {
        if ($this->speakers->removeElement($speaker)) {
            // set the owning side to null (unless already changed)
            if ($speaker->getEvent() === $this) {
                $speaker->setEvent(null);
            }
        }

        return $this;
    }

    public function getType(): ?EventType
    {
        return $this->type;
    }

    public function setType(EventType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
