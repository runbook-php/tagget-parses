<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Operator;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\Contract\TaggedParse\ComparisonOperatorContract;
use Wsw\Runbook\TaggedParse\TaggedParseException;

class NotEqualsTaggedOperatorParse extends BaseTaggedOperatorParse implements TaggedParseContract, ComparisonOperatorContract
{
    public function getName(): string
    {
        return 'NotEquals';
    }

    public function parse($value)
    {
        $a = $value;
        $b = $this->getValue();

        if (is_null($a)) {
            $a = '';
        }

        if (is_null($b)) {
            $b = '';
        }

        if (!is_scalar($a) || !is_scalar($b)) {
            throw new TaggedParseException('Only scalar types are accepted');
        }

        $a = is_numeric($a) ? (float) $a : $a;
        $b = is_numeric($b) ? (float) $b : $b;

        return $a !== $b;
    }
}
