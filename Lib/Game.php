<?php
/**
 * Created by PhpStorm.
 * User: coco
 * Date: 16/8/14
 * Time: 下午7:03
 */

namespace Lib;


class Game
{
    protected $cheeses = [];
    protected $tern = 1;    // 1黑方,2红方
    protected $deep = 3;    // 计算深度
    
    protected $map = [];

    public function run()
    {
        $this->init();
    }

    // 初始化游戏
    public function init()
    {
    }

    public function nextStep()
    {
        
    }
}