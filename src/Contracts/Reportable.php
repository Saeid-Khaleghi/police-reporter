<?php

namespace SaeidKhaleghi\PoliceReporter\Contracts;

use SaeidKhaleghi\PoliceReporter\Tags\Transaction;

interface Reportable
{
    public function toReportTransaction(): Transaction | string | array;
}
