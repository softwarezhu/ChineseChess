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

class ChessJu extends Chess
{
    public function __construct($color, Point $position, Map $map)
    {
        parent::__construct(self::JU, $color, $position, $map);

    }

    public function movablePoints()
    {
        $points = [];
        // 上
        for ($i = $this->position->y - 1; $i >= 0; $i--) {
            $point = new Point($this->position->x, $i);
            $chess = $this->map->get($point);
            if ($chess) {
                if ($chess->color != $this->color) {
                    $points[] = $point;
                }
                break;
            } else {
                $points[] = $point;
            }
        }
        // 下
        for ($i = $this->position->y + 1; $i <= 9; $i++) {
            $point = new Point($this->position->x, $i);
            $chess = $this->map->get($point);
            if ($chess) {
                if ($chess->color != $this->color) {
                    $points[] = $point;
                }
                break;
            } else {
                $points[] = $point;
            }
        }

        // 左
        for ($i = $this->position->x - 1; $i >= 0; $i--) {
            $point = new Point($i, $this->position->y);
            $chess = $this->map->get($point);
            if ($chess) {
                if ($chess->color != $this->color) {
                    $points[] = $point;
                }
                break;
            } else {
                $points[] = $point;
            }
        }

        // 右
        for ($i = $this->position->x + 1; $i <= 8; $i++) {
            $point = new Point($i, $this->position->y);
            $chess = $this->map->get($point);
            if ($chess) {
                if ($chess->color != $this->color) {
                    $points[] = $point;
                }
                break;
            } else {
                $points[] = $point;
            }
        }

        return $points;
    }
}