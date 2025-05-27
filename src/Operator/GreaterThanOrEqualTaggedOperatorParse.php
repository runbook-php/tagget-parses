<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Operator;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\Contract\TaggedParse\ComparisonOperatorContract;
use Wsw\Runbook\TaggedParse\TaggedParseException;

class GreaterThanOrEqualTaggedOperatorParse extends BaseTaggedOperatorParse implements TaggedParseContract, ComparisonOperatorContract
{
    public function getName(): string
    {
        return 'GreaterThanOrEqual';
    }

    public function parse($value)
    {
        $a = $value;
        $b = $this->getValue();

        if (!is_numeric($a) || !is_numeric($b)) {
            throw new TaggedParseException('Only numeric values ​​are accepted.');
        }
        return (float) $a >= (float) $b;
    }
}
