<?php
/**
 * Created by PhpStorm.
 * User: coco
 * Date: 16/8/14
 * Time: 下午11:36
 */

namespace Lib;


use Lib\Chesses\Chess;

class Step
{
    protected $chess;
    protected $point;
    
    public function __construct(Chess $chess, Point $point)
    {
        $this->chess = $chess;
        $this->point = $point;
    }
}