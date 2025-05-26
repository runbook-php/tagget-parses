<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Operator;

use Wsw\Runbook\Contract\TaggedParse\ComparisonOperatorContract;

abstract class BaseTaggedOperatorParse implements ComparisonOperatorContract
{
    private $value;

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
