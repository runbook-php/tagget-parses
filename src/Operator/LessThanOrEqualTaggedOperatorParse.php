<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Operator;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\Contract\TaggedParse\ComparisonOperatorContract;

class LessThanOrEqualTaggedOperatorParse extends BaseTaggedOperatorParse implements TaggedParseContract, ComparisonOperatorContract
{
    public function getName(): string
    {
        return 'LessThanOrEqual';
    }

    public function parse(string $value)
    {
        return $value <= $this->getValue();
    }
}
