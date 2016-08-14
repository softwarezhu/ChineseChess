<?php
namespace Lib;

use Lib\Chesses\Chess;
use Lib\Chesses\ChessBing;
use Lib\Chesses\ChessJiang;
use Lib\Chesses\ChessJu;
use Lib\Chesses\ChessMa;
use Lib\Chesses\ChessPao;
use Lib\Chesses\ChessShi;
use Lib\Chesses\ChessXiang;

/**
 * Created by PhpStorm.
 * User: coco
 * Date: 16/8/14
 * Time: 下午6:27
 */
class Map
{
    protected $chesses = [];

    protected $map = [];
    protected $rows = 10;
    protected $cols = 9;
    
    protected $score = 0;
    
    protected $blackChesses = [];
    protected $redChesses = [];

    public function init()
    {
        $this->blackChesses = [
            new ChessJu     (1, new Point(0, 0), $this),
            new ChessMa     (1, new Point(1, 0), $this),
            new ChessXiang  (1, new Point(2, 0), $this),
            new ChessShi    (1, new Point(3, 0), $this),
            new ChessJiang  (1, new Point(4, 0), $this),
            new ChessShi    (1, new Point(5, 0), $this),
            new ChessXiang  (1, new Point(6, 0), $this),
            new ChessMa     (1, new Point(7, 0), $this),
            new ChessJu     (1, new Point(8, 0), $this),

            new ChessPao    (1, new Point(1, 2), $this),
            new ChessPao    (1, new Point(7, 2), $this),

            new ChessBing   (1, new Point(0, 3), $this),
            new ChessBing   (1, new Point(3, 3), $this),
            new ChessBing   (1, new Point(5, 3), $this),
            new ChessBing   (1, new Point(7, 3), $this),
            new ChessBing   (1, new Point(9, 3), $this),
        ];
        
        $this->blackChesses = [
            new ChessBing   (2, new Point(0, 6), $this),
            new ChessBing   (2, new Point(3, 6), $this),
            new ChessBing   (2, new Point(5, 6), $this),
            new ChessBing   (2, new Point(7, 6), $this),
            new ChessBing   (2, new Point(9, 6), $this),

            new ChessPao    (2, new Point(1, 7), $this),
            new ChessPao    (2, new Point(7, 7), $this),

            new ChessJu     (2, new Point(0, 9), $this),
            new ChessMa     (2, new Point(1, 9), $this),
            new ChessXiang  (2, new Point(2, 9), $this),
            new ChessShi    (2, new Point(3, 9), $this),
            new ChessJiang  (2, new Point(4, 9), $this),
            new ChessShi    (2, new Point(5, 9), $this),
            new ChessXiang  (2, new Point(6, 9), $this),
            new ChessMa     (2, new Point(7, 9), $this),
            new ChessJu     (2, new Point(8, 9), $this),
        ];
    }

    public function set(Chess $chess, Point $position)
    {
        if ($chess != null) {
            $chess->position = $position;
        }
        $this->map[$position->y * $this->cols + $position->x] = $chess;
    }

    public function get(Point $position)
    {
        return $this->map[$position->y * $this->cols + $position->x];
    }

    // 吃掉对方的子
    public function replace(Chess $chess, Chess $target)
    {
        $chesses = $target->color == 1 ? $this->blackChesses : $this->redChesses;
        // 删掉这个子
        $pos = array_search($target, $chesses);
        unset($pos);
        
        $this->set(null, $chess->position);
        $this->set($chess, $target->position);
    }
    
    
}