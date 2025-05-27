<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\String;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\Contract\TaggedParse\ComparisonOperatorContract;
use Wsw\Runbook\TaggedParse\Operator\BaseTaggedOperatorParse;
use Wsw\Runbook\TaggedParse\TaggedParseException;

class TextBinderTaggedParse extends BaseTaggedOperatorParse implements TaggedParseContract, ComparisonOperatorContract
{
    public function getName(): string
    {
        return 'TextBinder';
    }

    public function parse($value)
    {
        if (!is_string($this->getValue())) {
            throw new TaggedParseException('values ​​must be of type string');
        }

        $vars = (array) $value;
        return $this->render($this->getValue(), $vars);
    }

    private function render(string $template, array $vars): string {
        return preg_replace_callback('/{{\s*(\w+)\s*}}/', function ($matches) use ($vars) {
            $key = $matches[1];
            return $vars[$key] ?? '';
        }, $template);
    }
}
