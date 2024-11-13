<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

class AccountRelatedPerson extends Tag
{
    public string $role;
    /** @var Person[] */
    public array $people = [];

    public static function create(Person $person, string $role = 'A'): static
    {
        return new static($person, $role);
    }

    public function __construct(Person $person, string $role = 'A')
    {
        $this->people[] = $person;
        $this->role = $role;
    }

    public function addPerson(Person $person)
    {
        $this->people[] = $person;

        return $this;
    }
}