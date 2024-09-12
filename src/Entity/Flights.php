<?php

namespace App\Entity;

use App\Repository\FlightsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlightsRepository::class)]
class Flights
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    private ?string $num_flight = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $hour_start = null;

    #[ORM\ManyToOne(inversedBy: 'city_start')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cities $city_start = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $hour_end = null;

    #[ORM\ManyToOne(inversedBy: 'city_end')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cities $city_end = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?bool $reduc = null;

    #[ORM\Column]
    private ?int $total_seats = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumFlight(): ?string
    {
        return $this->num_flight;
    }

    public function setNumFlight(string $num_flight): static
    {
        $this->num_flight = $num_flight;

        return $this;
    }

    public function getHourStart(): ?\DateTimeInterface
    {
        return $this->hour_start;
    }

    public function setHourStart(\DateTimeInterface $hour_start): static
    {
        $this->hour_start = $hour_start;

        return $this;
    }

    public function getCityStart(): ?Cities
    {
        return $this->city_start;
    }

    public function setCityStart(?Cities $city_start): static
    {
        $this->city_start = $city_start;

        return $this;
    }

    public function getHourEnd(): ?\DateTimeInterface
    {
        return $this->hour_end;
    }

    public function setHourEnd(\DateTimeInterface $hour_end): static
    {
        $this->hour_end = $hour_end;

        return $this;
    }

    public function getCityEnd(): ?Cities
    {
        return $this->city_end;
    }

    public function setCityEnd(?Cities $city_end): static
    {
        $this->city_end = $city_end;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function isReduc(): ?bool
    {
        return $this->reduc;
    }

    public function setReduc(bool $reduc): static
    {
        $this->reduc = $reduc;

        return $this;
    }

    public function getTotalSeats(): ?int
    {
        return $this->total_seats;
    }

    public function setTotalSeats(int $total_seats): static
    {
        $this->total_seats = $total_seats;

        return $this;
    }
}
