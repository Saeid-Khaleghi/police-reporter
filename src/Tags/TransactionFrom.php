<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

class TransactionFrom extends Tag
{
    public string $from_fund_code;
    public string $from_foreign_currency_code;
    public string $from_foreign_amount;
    public string $from_country;

    /** @var FromAccount[] */
    public array $from_accounts = [];

    public static function create(string $from_fund_code, string $from_foreign_currency_code, string $from_foreign_amount, string $from_country): static
    {
        return new static($from_fund_code, $from_foreign_currency_code, $from_foreign_amount, $from_country);
    }

    public function __construct(string $from_fund_code, string $from_foreign_currency_code, string $from_foreign_amount, string $from_country)
    {
        $this->from_fund_code = $from_fund_code;
        $this->from_foreign_currency_code = $from_foreign_currency_code;
        $this->from_foreign_amount = $from_foreign_amount;
        $this->from_country = $from_country;
    }

    public function addFromAccount(FromAccount $from_account): static
    {
        $this->from_accounts[] = $from_account;

        return $this;
    }
}
