<?php declare(strict_types=1);

namespace Wsw\Runbook\TaggedParse\Reference;

use Wsw\Runbook\Contract\TaggedParse\TaggedParseContract;
use Wsw\Runbook\Contract\TaggedParse\ResourceReferableContract;
use Wsw\Runbook\Contract\ResourceReferenceContract;

class RefTaggedParse implements TaggedParseContract, ResourceReferableContract
{
    private $references;
    public function getName(): string
    {
        return 'Ref';
    }

    public function setReferences(ResourceReferenceContract &$references): TaggedParseContract
    {
        $this->references = $references;
        return $this;
    }

    public function parse(string $value)
    {
        if ($this->references->has($value) === false) {
            throw new \RuntimeException('The resource reference "'.$value.'" was not found.');
        }

        return $this->references->get($value);
    }
}
