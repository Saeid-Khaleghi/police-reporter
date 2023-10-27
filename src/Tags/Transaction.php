<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

use Carbon\Carbon;
use DateTimeInterface;

class Transaction extends Tag
{
    public string $date;
    public string $location;
    public string $reference;
    public string $amountLocal;
    public string $transmodeCode;

    /** @var TransactionFrom[] */
    public array $transaction_froms = [];

    /** @var TransactionTo[] */
    public array $transaction_tos = [];


    public static function create($reference, $date, $amount, $location = 'web', $transmode_code = 'BA'): static
    {
        return new static($reference, $date, $amount, $location, $transmode_code);
    }

    public function __construct($reference, $date, $amount, $location = 'web', $transmode_code = 'BA')
    {
        $this->setNumber($reference);
        $this->setLocation($location);
        $this->setDate($date);
        $this->setTransmodeCode($transmode_code);
        $this->setAmountLocal($amount);
    }

    public function setNumber(string $reference = ''): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function setLocation(string $location = 'web'): static
    {
        $this->location = $location;

        return $this;
    }

    public function setDate(DateTimeInterface $date): static
    {
        $this->date = Carbon::instance($date)->toDateTimeLocalString();

        return $this;
    }

    public function setTransmodeCode(string $transmodeCode = 'BA'): static
    {
        $this->transmodeCode = $transmodeCode;

        return $this;
    }

    public function setAmountLocal(float $amount): static
    {
        $this->amountLocal = $amount;

        return $this;
    }

    public function addFromMyClient(TransactionFrom $fromMyClient): static
    {
        $this->transaction_froms[] = $fromMyClient;

        return $this;
    }

    public function addTransactionTo(TransactionTo $to): static
    {
        $this->transaction_tos[] = $to;

        return $this;
    }

}
