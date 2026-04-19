<?php

namespace App\Models;

use App\Models\InterfaceHitung;

class BangunDatar extends InterfaceHitung
{
    protected $namaBangunDatar;

    public function getNamaBangunDatar()
    {
        return $this->namaBangunDatar;
    }
}
