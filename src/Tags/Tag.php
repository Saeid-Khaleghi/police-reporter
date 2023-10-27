<?php

namespace SaeidKhaleghi\PoliceReporter\Tags;

abstract class Tag
{
    public function getType(): string
    {
        return mb_strtolower(class_basename(static::class));
    }
}
