<?php

namespace Amranidev\Ajaxis\Materialize\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

class MaterializeDisplayBuilder implements ModalInterface
{
    public $Modal;

    public function __construct()
    {
        $this->Modal = new Modal();
    }

    public function buildHead($title)
    {
        $this->Modal->modalHead = '';
    }

    public function buildBody($a, $b, $c, $input)
    {
        $this->Modal->modalBody .= view('Ajaxis::materialize.display.body', compact('input'))->render();
    }

    public function buildFooter($link, $action)
    {
        $this->Modal->modalFooter = '';
    }

    public function getResult()
    {
        return $this->Modal;
    }
}
