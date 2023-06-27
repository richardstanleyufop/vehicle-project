<?php

namespace Estudo\Projeto\Model;

class User
{
    public ?int $id;
    public string $name;
    public string $email;
    public string $password;
    public ?string $img;

    public function __construct(string $name,string $email,string $password, ?string $img){
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
        $this->img=$img;

    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }



}