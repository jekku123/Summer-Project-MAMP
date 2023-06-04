<?php

namespace App\Entity;

use App\Repository\AttendeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Put;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AttendeeRepository::class)]
#[ApiResource(
    operations: [
        new Post(),
        new GetCollection(),
        new Get(),
        new Put(),
        new Patch()
    ],
    normalizationContext: [
        'groups' => ['attendee:read']
    ],
    denormalizationContext: ['groups' => ['attendee:write']],
)]
class Attendee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    #[Groups(['attendee:read', 'attendee:write'])]
    private ?string $firstname = null;

    #[ORM\Column(length: 30, nullable: true)]
    #[Groups(['attendee:read', 'attendee:write'])]
    private ?string $lastname = null;

    #[ORM\Column(length: 50)]
    #[Groups(['attendee:read', 'attendee:write'])]
    private ?string $email = null;

    #[ORM\Column(length: 30, nullable: true)]
    #[Groups(['attendee:read', 'attendee:write'])]
    private ?string $phone = null;

    #[ORM\ManyToOne(inversedBy: 'attendees')]
    #[Groups(['attendee:read'])]
    private ?Event $event = null;

    #[ORM\ManyToMany(targetEntity: Workshop::class, mappedBy: 'attendees')]
    #[Groups(['attendee:read'])]
    private Collection $workshops;

    #[ORM\OneToMany(mappedBy: 'attendee', targetEntity: Feedback::class)]
    #[Groups(['attendee:read'])]
    private Collection $feedback;

    #[ORM\Column]
    #[Groups(['attendee:read'])]
    private ?\DateTimeImmutable $registered_at = null;

    public function __construct()
    {
        $this->registered_at = new \DateTimeImmutable();
        $this->workshops = new ArrayCollection();
        $this->feedback = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

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
            $workshop->addAttendee($this);
        }

        return $this;
    }

    public function removeWorkshop(Workshop $workshop): self
    {
        if ($this->workshops->removeElement($workshop)) {
            $workshop->removeAttendee($this);
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
            $feedback->setAttendee($this);
        }

        return $this;
    }

    public function removeFeedback(Feedback $feedback): self
    {
        if ($this->feedback->removeElement($feedback)) {
            // set the owning side to null (unless already changed)
            if ($feedback->getAttendee() === $this) {
                $feedback->setAttendee(null);
            }
        }

        return $this;
    }

    public function getRegisteredAt(): ?\DateTimeImmutable
    {
        return $this->registered_at;
    }

    public function setRegisteredAt(\DateTimeImmutable $registered_at): self
    {
        $this->registered_at = $registered_at;

        return $this;
    }
}
