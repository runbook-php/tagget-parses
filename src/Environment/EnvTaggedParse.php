<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Environment;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;

class EnvTaggedParse implements TaggedParseContract
{
    public function getName(): string
    {
        return 'Env';
    }

    public function parse($value)
    {
        if (getenv($value) === false) {
            throw new \RuntimeException('The environment variable "'.$value.'" was not found.');
        }

        return getenv($value);
    }
}
