<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

use Carbon\Carbon;
use DateTimeInterface;

class Person extends Tag
{
    public string $gender;
    public string $first_name;
    public string $last_name;
    public ?string $birthdate;
    public ?string $id_number;

    public ?PersonIdentification $identification = null;

    public static function create(string $gender, string $first_name, string $last_name, ?string $birthdate, ?string $id_number = null): static
    {
        return new static($gender, $first_name, $last_name, $birthdate, $id_number);
    }

    public function __construct(string $gender, string $first_name, string $last_name, ?DateTimeInterface $birthdate, ?string $id_number = null)
    {
        $this->gender = $gender;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birthdate = Carbon::instance($birthdate)->toDateTimeLocalString();
        $this->id_number = $id_number;
    }

    public function setIdentification(string $type, string $number, string $issue_country, ?DateTimeInterface $expiry_date = null): static
    {
        $this->identification = PersonIdentification::create($type, $number, $issue_country, $expiry_date);

        return $this;
    }
}
