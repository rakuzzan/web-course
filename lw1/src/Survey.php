<?php

class Survey
{
    private string $email;
    private string $firstName;
    private string $lastName;
    private string $age;

    public function __construct($email, $firstName, $lastName, $age)
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAge(): string
    {
        return $this->age;
    }
}