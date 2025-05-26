<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Operator;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\Contract\TaggedParse\ComparisonOperatorContract;

class GreaterThanTaggedOperatorParse extends BaseTaggedOperatorParse implements TaggedParseContract, ComparisonOperatorContract
{
    public function getName(): string
    {
        return 'GreaterThan';
    }

    public function parse(string $value)
    {
        return (int)$this->getValue() > (int)$value;
    }
}
