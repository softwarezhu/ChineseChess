<?php
namespace Lib\Chesses;

use Lib\Map;
use Lib\Point;
/**
 * Created by PhpStorm.
 * User: coco
 * Date: 16/8/14
 * Time: 下午6:36
 */
class Chess
{
    const JIANG = 0;
    const SHI = 1;
    const XIANG = 2;
    const MA = 3;
    const JU = 4;
    const PAO = 5;
    const BING = 6;

    /**
     * @var Point
     */
    public $position;
    public $type;   // 类型
    public $color;  // 颜色,1黑色,2红色
    public $map;
    
    public function __construct($type, $color, Point $position, Map $map)
    {
        $this->type = $type;
        $this->color = $color;
        $this->position = $position;
        $this->map = $map;
        
    }
    
    public abstract function movablePoints();

}