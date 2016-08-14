<?php
/**
 * Created by PhpStorm.
 * User: coco
 * Date: 16/8/14
 * Time: 下午7:39
 */

namespace Lib\Chesses;


use Lib\Point;
use Lib\Map;

class ChessJiang extends Chess
{
    protected $moveRegionBlack;
    protected $moveRegionRed;
    protected $region;

    public function __construct($color, Point $position, Map $map)
    {
        parent::__construct(self::JIANG, $color, $position, $map);

        $this->moveRegionBlack= [
            new Point(3, 0),
            new Point(4, 0),
            new Point(5, 0),
            new Point(3, 1),
            new Point(4, 1),
            new Point(5, 1),
            new Point(3, 2),
            new Point(4, 2),
            new Point(5, 2),
        ];
        $this->moveRegionRed= [
            new Point(3, 8),
            new Point(4, 8),
            new Point(5, 8),
            new Point(3, 9),
            new Point(4, 9),
            new Point(5, 9),
            new Point(3, 10),
            new Point(4, 10),
            new Point(5, 10),
        ];

        if ($color == 1) {
            $this->moveRegionBlack;
        } else {
            $this->moveRegionBlack;
        }
    }

    public function movablePoints()
    {
        $points = [];
        // 可用的点
        foreach ($this->region as $point) {
            // 自己的点,不可达
            if ($point->equals($this->position)) {
                continue;
            }
            
            // 距离大于2的点,不可达
            if (abs($point->x - $this->position->x) >= 2 || abs($point->y - $this->position->y) >= 2) {
                continue;
            }
            // 
            $chess = $this->map->get($point);

            // 自己同色的子,不可达
            if ($chess && $chess->color == $this->color) {
                continue;
            }
            
            $points[] = $point;
        }

        return $points;
    }
}