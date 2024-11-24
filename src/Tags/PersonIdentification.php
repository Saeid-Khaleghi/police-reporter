<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

use Carbon\Carbon;
use DateTimeInterface;

class PersonIdentification extends Tag
{
    public string $type;
    public string $number;
    public string $issue_country;
    public ?string $expiry_date;

    public static function create(string $type, string $number, string $issue_country, ?DateTimeInterface $expiry_date = null): static
    {
        return new static($type, $number, $issue_country, $expiry_date);
    }

    public function __construct(string $type, string $number, string $issue_country, ?DateTimeInterface $expiry_date = null)
    {
        $this->type = $type;
        $this->number = $number;
        $this->issue_country = $issue_country;
        $this->expiry_date = $expiry_date ? Carbon::instance($expiry_date)->toDateTimeLocalString() : null;
    }
}
