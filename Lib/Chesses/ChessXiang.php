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

class ChessXiang extends Chess
{
    protected $moveRegionBlack;
    protected $moveRegionRed;
    protected $region;

    public function __construct($color, Point $position, Map $map)
    {
        parent::__construct(self::XIANG, $color, $position, $map);

        $this->moveRegionBlack= [
            new Point(2, 0),
            new Point(6, 0),
            new Point(0, 2),
            new Point(4, 2),
            new Point(8, 2),
            new Point(2, 4),
            new Point(6, 4),
        ];
        $this->moveRegionRed= [
            new Point(2, 5),
            new Point(6, 5),
            new Point(0, 7),
            new Point(4, 7),
            new Point(8, 7),
            new Point(2, 9),
            new Point(6, 9),
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
            if (abs($point->x - $this->position->x) > 2 || abs($point->y - $this->position->y) > 2) {
                continue;
            }
            // 
            $chess = $this->map->get($point);

            // 自己同色的子,不可达
            if ($chess && $chess->color == $this->color) {
                continue;
            }

            // 如果被憋住了,不可达
            $midPoint = $this->getMidPoint($point);
            $chess = $this->map->get($midPoint);
            if ($chess) {
                continue;
            }


            $points[] = $point;
        }

        return $points;
    }

    public function getMidPoint(Point $point)
    {
        return new Point(
            $this->position->x + ($point->x - $this->position->x) / 2,
            $this->position->y + ($point->y - $this->position->y) / 2
        );
    }
}