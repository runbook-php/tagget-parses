<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Operator;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\Contract\TaggedParse\ComparisonOperatorContract;
use Wsw\Runbook\TaggedParse\TaggedParseException;

class StartsWithTaggedOperatorParse extends BaseTaggedOperatorParse implements TaggedParseContract, ComparisonOperatorContract
{
    public function getName(): string
    {
        return 'StartsWith';
    }

    public function parse($value)
    {
        if (!is_string($value)) {
            throw new TaggedParseException('value ​​must be of type string');
        }

        $prefix = $value;
        return substr($this->getValue(), 0, strlen($prefix)) === $prefix;
    }
}
