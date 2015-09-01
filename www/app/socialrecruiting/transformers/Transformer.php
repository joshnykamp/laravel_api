<?php
/**
 * Created by PhpStorm.
 * User: joshnykamp
 * Date: 5/8/15
 * Time: 8:02 AM
 */

namespace App\socialrecruiting\transformers;


abstract class Transformer {

    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}