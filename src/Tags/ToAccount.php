<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

class ToAccount extends Tag
{
    public ?string $swift;
    public string $account;
    public string $account_name;
    public string $institution_name;

    public static function create(string $institution_name, string $account, string $account_name, ?string $swift = null): static
    {
        return new static($institution_name, $account, $account_name, $swift);
    }

    public function __construct(string $institution_name, string $account, string $account_name, ?string $swift = null)
    {
        $this->institution_name = $institution_name;
        $this->account = $account;
        $this->swift = $swift;
        $this->account_name = $account_name;
    }
}
