<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

class TransactionTo extends Tag
{
    public string $to_fund_code;
    public string $to_foreign_currency_code;
    public string $to_foreign_amount;
    public string $to_country;
    public ToAccount $to_account;
    public ToPerson $to_person;

    public static function create(string $to_fund_code, string $to_foreign_currency_code, string $to_foreign_amount, string $to_country): static
    {
        return new static($to_fund_code, $to_foreign_currency_code, $to_foreign_amount, $to_country);
    }

    public function __construct(string $to_fund_code, string $to_foreign_currency_code, string $to_foreign_amount, string $to_country)
    {
        $this->to_fund_code = $to_fund_code;
        $this->to_foreign_currency_code = $to_foreign_currency_code;
        $this->to_foreign_amount = $to_foreign_amount;
        $this->to_country = $to_country;
    }

    public function addToAccount(ToAccount $toAccount): static
    {
        $this->to_account = $toAccount;

        return $this;
    }

    public function addToPerson(ToPerson $toPerson): static
    {
        $this->to_person = $toPerson;

        return $this;
    }
}
