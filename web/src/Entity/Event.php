<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Conference::class)]
    private Collection $conferences;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Seminar::class)]
    private Collection $seminars;

    public function __construct()
    {
        $this->conferences = new ArrayCollection();
        $this->seminars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Conference>
     */
    public function getConferences(): Collection
    {
        return $this->conferences;
    }

    public function addConference(Conference $conference): self
    {
        if (!$this->conferences->contains($conference)) {
            $this->conferences->add($conference);
            $conference->setEvent($this);
        }

        return $this;
    }

    public function removeConference(Conference $conference): self
    {
        if ($this->conferences->removeElement($conference)) {
            // set the owning side to null (unless already changed)
            if ($conference->getEvent() === $this) {
                $conference->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Seminar>
     */
    public function getSeminars(): Collection
    {
        return $this->seminars;
    }

    public function addSeminar(Seminar $seminar): self
    {
        if (!$this->seminars->contains($seminar)) {
            $this->seminars->add($seminar);
            $seminar->setEvent($this);
        }

        return $this;
    }

    public function removeSeminar(Seminar $seminar): self
    {
        if ($this->seminars->removeElement($seminar)) {
            // set the owning side to null (unless already changed)
            if ($seminar->getEvent() === $this) {
                $seminar->setEvent(null);
            }
        }

        return $this;
    }
}
