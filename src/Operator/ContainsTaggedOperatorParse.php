<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Operator;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\Contract\TaggedParse\ComparisonOperatorContract;
use Wsw\Runbook\TaggedParse\TaggedParseException;

class ContainsTaggedOperatorParse extends BaseTaggedOperatorParse implements TaggedParseContract, ComparisonOperatorContract
{
    public function getName(): string
    {
        return 'Contains';
    }

    public function parse($value)
    {
        if (!is_string($value) || !is_string($this->getValue())) {
            throw new TaggedParseException('values ​​must be of type string');
        }

        return strpos($value, $this->getValue()) !== false;
    }
}
