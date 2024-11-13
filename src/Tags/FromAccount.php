<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

class FromAccount extends Tag
{
    public string $branch;
    public string $account;
    public string $account_name;
    public string $institution_name;
    public string $institution_code;
    public string $non_bank_institution;

    /** @var RelatedPersons[] */
    public array $related_persons = [];

    public static function create(string $institution_name, string $institution_code, string $branch, string $account, string $account_name, bool $non_bank_institution = true): static
    {
        return new static($institution_name, $institution_code, $branch, $account, $account_name, $non_bank_institution);
    }

    public function __construct(string $institution_name, string $institution_code, string $branch, string $account, string $account_name, bool $non_bank_institution = true)
    {
        $this->institution_name = $institution_name;
        $this->institution_code = $institution_code;
        $this->branch = $branch;
        $this->account = $account;
        $this->account_name = $account_name;
        $this->non_bank_institution = $non_bank_institution;
    }

    public function addAccountRelatedPerson(AccountRelatedPerson $accountRelatedPerson): static
    {
        $this->related_persons[] = $accountRelatedPerson;

        return $this;
    }
}
