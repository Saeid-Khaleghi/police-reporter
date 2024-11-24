<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

use Carbon\Carbon;
use DateTimeInterface;

class Person extends Tag
{
    public string $gender;
    public string $first_name;
    public string $last_name;
    public string $id_number;
    public string $id_type;
    public string $issue_country;
    public ?string $birthdate;

    /** @var PersonIdentification[] */
    public array $identifications = [];

    public static function create(string $gender, string $first_name, string $last_name, ?string $birthdate, string $id_type, string $id_number, string $issue_country, ?PersonIdentification $identification = null): static
    {
        return new static($gender, $first_name, $last_name, $birthdate, $id_type, $id_number, $issue_country, $identification);
    }

    public function __construct(string $gender, string $first_name, string $last_name, ?DateTimeInterface $birthdate, $id_type, string $id_number, string $issue_country, ?PersonIdentification $identification = null)
    {
        $this->gender = $gender;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->id_type = $id_type;
        $this->id_number = $id_number;
        $this->issue_country = $issue_country;
        $this->birthdate = Carbon::instance($birthdate)->toDateTimeLocalString();
        $this->identifications[] = $identification;
    }

    public function makeIdentification(string $type, string $number, string $issue_country, ?DateTimeInterface $expiry_date = null): static
    {
        $this->identifications[] = PersonIdentification::create($type, $number, $issue_country, $expiry_date);

        return $this;
    }

    public function addIdentification(PersonIdentification $identification): static
    {
        $this->identifications[] = $identification;

        return $this;
    }
}
