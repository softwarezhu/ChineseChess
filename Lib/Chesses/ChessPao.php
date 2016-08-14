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

class ChessPao extends Chess
{
    public function __construct($color, Point $position, Map $map)
    {
        parent::__construct(self::PAO, $color, $position, $map);

    }

    public function movablePoints()
    {
        $points = [];
        // 上
        $jump = false;
        for ($i = $this->position->y - 1; $i >= 0; $i--) {
            $point = new Point($this->position->x, $i);
            $chess = $this->map->get($point);
            if (!$jump) {
                if ($chess) {
                    $jump = true;
                } else {
                    $points[] = $point;
                }
            } else {
                if ($chess) {
                    if ($chess->color != $this->color) {
                        $points[] = $point;
                    }
                    break;
                }
            }
        }
        // 下
        $jump = false;
        for ($i = $this->position->y + 1; $i <= 9; $i++) {
            $point = new Point($this->position->x, $i);
            $chess = $this->map->get($point);
            if (!$jump) {
                if ($chess) {
                    $jump = true;
                } else {
                    $points[] = $point;
                }
            } else {
                if ($chess) {
                    if ($chess->color != $this->color) {
                        $points[] = $point;
                    }
                    break;
                }
            }
        }
        // 左
        $jump = false;
        for ($i = $this->position->x - 1; $i >= 0; $i--) {
            $point = new Point($i, $this->position->y);
            $chess = $this->map->get($point);
            if (!$jump) {
                if ($chess) {
                    $jump = true;
                } else {
                    $points[] = $point;
                }
            } else {
                if ($chess) {
                    if ($chess->color != $this->color) {
                        $points[] = $point;
                    }
                    break;
                }
            }
        }

        // 右
        $jump = false;
        for ($i = $this->position->x + 1; $i <= 8; $i++) {
            $point = new Point($i, $this->position->y);
            $chess = $this->map->get($point);
            if (!$jump) {
                if ($chess) {
                    $jump = true;
                } else {
                    $points[] = $point;
                }
            } else {
                if ($chess) {
                    if ($chess->color != $this->color) {
                        $points[] = $point;
                    }
                    break;
                }
            }
        }
        return $points;
    }
}