<?php
namespace Acme\Transformers;

class TagTransformer extends Transformer {

    /**
     * @param $tag
     * @return array $tag
     */
    public function transform($tag)
    {
        return [
            'tag_name'  => $tag['name']
        ];
    }
}