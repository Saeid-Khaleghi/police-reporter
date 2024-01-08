<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

class ToPerson extends Tag
{
    public string $first_name;
    public string $last_name;

    public static function create(string $first_name, string $last_name): static
    {
        return new static($first_name, $last_name);
    }

    public function __construct(string $first_name, string $last_name)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
}
