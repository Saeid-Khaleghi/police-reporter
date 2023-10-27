<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

class Signatory  extends Tag
{
    /** @var Person[] */
    public array $signatories = [];

    public static function create(Person $person): static
    {
        return new static($person);
    }

    public function __construct(Person $person)
    {
        $this->signatories[] = $person;
    }

    public function addPerson(Person $person)
    {
        $this->signatories[] = $person;

        return $this;
    }
}
