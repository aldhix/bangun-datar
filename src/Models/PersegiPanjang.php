<?php

namespace App\Models;

use App\Models\BangunDatar;

class PersegiPanjang extends BangunDatar
{
    private $panjang;
    private $lebar;

    public function __construct($panjang = 7, $lebar = 4)
    {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
        $this->namaBangunDatar = "Persegi Panjang";
    }

    public function hitungLuas()
    {
        return $this->panjang * $this->lebar;
    }

    public function hitungKeliling()
    {
        return 2 * ($this->panjang + $this->lebar);
    }
}
