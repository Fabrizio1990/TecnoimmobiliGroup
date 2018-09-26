<?php

/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 26/09/2018
 * Time: 15:33
 */
class RetStruct
{
    //-1 => failed
    // 0 => warning
    // 1 => success
    public $retState = -1;
    public $retText ="";

    public function __construct($_retState,$_retText) {
        $this->retState = $_retState;
        $this->retText = $_retText;
    }
}