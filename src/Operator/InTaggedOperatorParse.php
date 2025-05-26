<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Operator;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\Contract\TaggedParse\ComparisonOperatorContract;

class InTaggedOperatorParse extends BaseTaggedOperatorParse implements TaggedParseContract, ComparisonOperatorContract
{
    public function getName(): string
    {
        return 'In';
    }

    public function parse(string $value)
    {
        $list = is_array($this->getValue()) ? $this->getValue() : explode(',', $this->getValue());
        return in_array($value, $list, true);
    }
}
