<?php
namespace Lib;

/**
 * Created by PhpStorm.
 * User: coco
 * Date: 16/8/14
 * Time: 下午6:57
 */
class Point
{
    public $x;
    public $y;
    
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    
    public function equals(Point $other)
    {
        return $this->x == $other->x && $this->y == $other->y;
    }
    
    public function up()
    {
        return new Point($this->x, $this->y - 1);
    }
    public function down()
    {
        return new Point($this->x, $this->y + 1);
    }
    public function left()
    {
        return new Point($this->x - 1, $this->y);
    }
    public function right()
    {
        return new Point($this->x + 1, $this->y);
    }
    
    public function offset($x, $y)
    {
        return new Point($this->x + $x, $this->y + $y);
    }
}