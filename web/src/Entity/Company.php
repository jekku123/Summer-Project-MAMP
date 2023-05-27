<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $website = null;

    #[ORM\OneToMany(mappedBy: 'company', targetEntity: Booth::class)]
    private Collection $booths;

    public function __construct()
    {
        $this->booths = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return Collection<int, Booth>
     */
    public function getBooths(): Collection
    {
        return $this->booths;
    }

    public function addBooth(Booth $booth): self
    {
        if (!$this->booths->contains($booth)) {
            $this->booths->add($booth);
            $booth->setCompany($this);
        }

        return $this;
    }

    public function removeBooth(Booth $booth): self
    {
        if ($this->booths->removeElement($booth)) {
            // set the owning side to null (unless already changed)
            if ($booth->getCompany() === $this) {
                $booth->setCompany(null);
            }
        }

        return $this;
    }
}
