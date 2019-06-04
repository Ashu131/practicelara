<?php
namespace Acme\Transformers;

abstract class Transformer {

    /**
     * @param array $items
     * @return array $items
     */
    public function transformCollection(array $items)
    {
        return array_map([$this,'transform'], $items);
    }

    public abstract function transform($item);
}