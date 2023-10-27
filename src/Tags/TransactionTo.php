<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

class TransactionTo extends Tag
{
    public string $to_fund_code;
    public string $to_country;

    /** @var ToAccount[] */
    public array $to_accounts = [];

    public static function create(string $to_fund_code, string $to_country): static
    {
        return new static($to_fund_code, $to_country);
    }

    public function __construct(string $to_fund_code, string $to_country)
    {
        $this->to_fund_code = $to_fund_code;
        $this->to_country = $to_country;
    }

    public function addToAccount(ToAccount $toAccount): static
    {
        $this->to_accounts[] = $toAccount;

        return $this;
    }
}
