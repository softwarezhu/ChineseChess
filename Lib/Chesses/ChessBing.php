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

class ChessBing extends Chess
{
    public function __construct($color, Point $position, Map $map)
    {
        parent::__construct(self::BING, $color, $position, $map);

    }

    public function movablePoints()
    {
        $points = [];
        $nearPoints = [
            $this->position->left(),
            $this->position->right(),
            $this->color == 1 ? $this->position->down() : $this->position->up(),
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
            
            $points[] = $point;
        }

        return $points;
    }
}