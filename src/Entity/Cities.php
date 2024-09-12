<?php

namespace App\Entity;

use App\Repository\CitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CitiesRepository::class)]
class Cities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    /**
     * @var Collection<int, Flights>
     */
    #[ORM\OneToMany(targetEntity: Flights::class, mappedBy: 'city_start')]
    private Collection $city_start;

    /**
     * @var Collection<int, Flights>
     */
    #[ORM\OneToMany(targetEntity: Flights::class, mappedBy: 'city_end')]
    private Collection $city_end;

    public function __construct()
    {
        $this->city_start = new ArrayCollection();
        $this->city_end = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Flights>
     */
    public function getCityStart(): Collection
    {
        return $this->city_start;
    }

    public function addCityStart(Flights $cityStart): static
    {
        if (!$this->city_start->contains($cityStart)) {
            $this->city_start->add($cityStart);
            $cityStart->setCityStart($this);
        }

        return $this;
    }

    public function removeCityStart(Flights $cityStart): static
    {
        if ($this->city_start->removeElement($cityStart)) {
            // set the owning side to null (unless already changed)
            if ($cityStart->getCityStart() === $this) {
                $cityStart->setCityStart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Flights>
     */
    public function getCityEnd(): Collection
    {
        return $this->city_end;
    }

    public function addCityEnd(Flights $cityEnd): static
    {
        if (!$this->city_end->contains($cityEnd)) {
            $this->city_end->add($cityEnd);
            $cityEnd->setCityEnd($this);
        }

        return $this;
    }

    public function removeCityEnd(Flights $cityEnd): static
    {
        if ($this->city_end->removeElement($cityEnd)) {
            // set the owning side to null (unless already changed)
            if ($cityEnd->getCityEnd() === $this) {
                $cityEnd->setCityEnd(null);
            }
        }

        return $this;
    }
}
