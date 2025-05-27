<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Operator;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\Contract\TaggedParse\ComparisonOperatorContract;
use Wsw\Runbook\TaggedParse\TaggedParseException;

class InTaggedOperatorParse extends BaseTaggedOperatorParse implements TaggedParseContract, ComparisonOperatorContract
{
    public function getName(): string
    {
        return 'In';
    }

    public function parse($value)
    {
        if (!is_scalar($value)) {
            throw new TaggedParseException('Only scalar types are accepted');
        }

        $list = is_array($this->getValue()) ? $this->getValue() : explode(',', $this->getValue());
        return in_array($value, $list, true);
    }
}
