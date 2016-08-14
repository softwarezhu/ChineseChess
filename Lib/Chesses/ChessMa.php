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

class ChessMa extends Chess
{
    public function __construct($color, Point $position, Map $map)
    {
        parent::__construct(self::MA, $color, $position, $map);

    }

    public function movablePoints()
    {
        $points = [];
        $nearPoints = [
            $this->position->offset(-2, -1),
            $this->position->offset(-2, +1),

            $this->position->offset(+2, -1),
            $this->position->offset(+2, +1),

            $this->position->offset(-1, -2),
            $this->position->offset(+1, -2),

            $this->position->offset(-1, +2),
            $this->position->offset(+1, +2),
        ];

        foreach ($nearPoints as $point) {
            if ($point->x < 0 || $point->y < 0 ||
                $point->x > 8 || $point->y > 9) {
                continue;
            }
            $chess = $this->map->get($point);
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
        $deltaX = $point->x - $this->position->x;
        $deltaY = $point->y - $this->position->y;
        if ($deltaX == 2) {
            return $point->right();
        }
        if ($deltaX == -2) {
            return $point->left();
        }

        if ($deltaY == 2) {
            return $point->down();
        }

        if ($deltaY == -2) {
            return $point->up();
        }

        return null;
    }

}