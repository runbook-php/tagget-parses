<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Datetime;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;

class DateNowTaggedParse implements TaggedParseContract
{
    public function getName(): string
    {
        return 'DateNow';
    }

    public function parse($value)
    {
        $date = new \DateTime('now', new \DateTimeZone('UTC'));
        return $date->format($value);
    }
}
