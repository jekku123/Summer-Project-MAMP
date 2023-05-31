<?php

namespace App\Entity;

use App\Repository\AttendeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttendeeRepository::class)]
class Attendee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(nullable: false, options: ["default" => 0])]
    private ?bool $is_attending = null;

    #[ORM\ManyToOne(inversedBy: 'attendees')]
    private ?Conference $conference = null;

    #[ORM\ManyToOne(inversedBy: 'attendees')]
    private ?Seminar $seminar = null;

    #[ORM\OneToMany(mappedBy: 'attendee', targetEntity: WorkshopAttendee::class)]
    private Collection $workshopAttendees;

    public function __construct()
    {
        $this->workshopAttendees = new ArrayCollection();
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

    public function isIsAttending(): ?bool
    {
        return $this->is_attending;
    }

    public function setIsAttending(?bool $is_attending): self
    {
        $this->is_attending = $is_attending;

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
            $workshopAttendee->setAttendee($this);
        }

        return $this;
    }

    public function removeWorkshopAttendee(WorkshopAttendee $workshopAttendee): self
    {
        if ($this->workshopAttendees->removeElement($workshopAttendee)) {
            // set the owning side to null (unless already changed)
            if ($workshopAttendee->getAttendee() === $this) {
                $workshopAttendee->setAttendee(null);
            }
        }

        return $this;
    }
}
