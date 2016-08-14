<?php
/**
 * Created by PhpStorm.
 * User: coco
 * Date: 16/8/14
 * Time: 下午11:21
 */

namespace Lib;


class AIPlayer
{
    protected $color;
    protected $map;
    
    public function __construct(Map $map, $color)
    {
        $this->color = $color;
        $this->map = $map;
        
    }

    public function evaluate(Map $map)
    {
        return 0;
    }
    
    public function nextStep()
    {
        
    }
}