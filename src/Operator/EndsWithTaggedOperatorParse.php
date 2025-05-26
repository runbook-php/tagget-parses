<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Operator;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\Contract\TaggedParse\ComparisonOperatorContract;

class EndsWithTaggedOperatorParse extends BaseTaggedOperatorParse implements TaggedParseContract, ComparisonOperatorContract
{
    public function getName(): string
    {
        return 'EndsWith';
    }

    public function parse(string $value)
    {
        $suffix = $this->getValue();
        return substr($value, -strlen($suffix)) === $suffix;
    }
}
