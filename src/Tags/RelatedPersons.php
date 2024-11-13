<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

class RelatedPersons extends Tag
{
    /** @var AccountRelatedPerson[] */
    public array $account_related_persons = [];

    public static function create(AccountRelatedPerson $accountRelatedPerson): static
    {
        return new static($accountRelatedPerson);
    }

    public function __construct(AccountRelatedPerson $accountRelatedPerson)
    {
        $this->account_related_persons[] = $accountRelatedPerson;
    }

    public function addAccountRelatedPerson(AccountRelatedPerson $accountRelatedPerson): static
    {
        $this->account_related_persons[] = $accountRelatedPerson;

        return $this;
    }
}