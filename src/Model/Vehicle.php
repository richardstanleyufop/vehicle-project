<?php

namespace Estudo\Projeto\Model;

class Vehicle
{
    public ?int $id;
    public readonly string $plate;
    public readonly string $name;
    public readonly int $year;
    public readonly string $url;



    public function __construct(string $name,string $plate, int $year,string $url){
        $this->plate=$plate;
        $this->year=$year;
        $this->name=$name;
        $this->url=$url;

    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
    public function plate(): string
    {
        return $this->plate;
    }
    public function year(): int
    {
        return $this->year;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */


    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }


}