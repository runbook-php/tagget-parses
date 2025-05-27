<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\String;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\TaggedParse\TaggedParseException;

class TextBinderTaggedParse implements TaggedParseContract
{
    public function getName(): string
    {
        return 'TextBinder';
    }

    public function parse($value)
    {
        if (!isset($value['template'])) {
            throw new TaggedParseException('The "template" field is mandatory in TextBinder');
        }

        if (!isset($value['vars'])) {
            throw new TaggedParseException('The "vars" field is mandatory in TextBinder');
        }
        
        if (!is_string($value['template'])) {
            throw new TaggedParseException('The "template" field values must be of type string');
        }

        if (!is_string($value['template'])) {
            throw new TaggedParseException('The "template" field cannot be empty');
        }
        
        if (!is_array($value['vars'])) {
            throw new TaggedParseException('The "vars" field must be of type array');
        }

        if (count($value['vars']) === 0) {
            throw new TaggedParseException('The "vars" field cannot be empty');
        }


        $template = $value['template'];
        $vars = $value['vars'];

        return $this->render($template, $vars);
    }

    private function render(string $template, array $vars): string {
        return preg_replace_callback('/{{\s*(\w+)\s*}}/', function ($matches) use ($vars) {
            $key = $matches[1];
            return $vars[$key] ?? '';
        }, $template);
    }
}
