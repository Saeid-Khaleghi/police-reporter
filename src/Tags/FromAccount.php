<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

class FromAccount extends Tag
{
    public string $branch;
    public string $account;
    public string $account_name;
    public string $institution_name;
    public string $institution_code;

    /** @var Signatory[] */
    public array $signatories = [];

    public static function create(string $institution_name, string $institution_code, string $branch, string $account, string $account_name): static
    {
        return new static($institution_name, $institution_code, $branch, $account, $account_name);
    }

    public function __construct(string $institution_name, string $institution_code, string $branch, string $account, string $account_name)
    {
        $this->institution_name = $institution_name;
        $this->institution_code = $institution_code;
        $this->branch = $branch;
        $this->account = $account;
        $this->account_name = $account_name;
    }

    public function addSignatory(Signatory $signatory): static
    {
        $this->signatories[] = $signatory;

        return $this;
    }
}
