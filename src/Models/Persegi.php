<?php

namespace App\Models;

use App\Models\BangunDatar;

class Persegi extends BangunDatar
{
    private $sisi;

    public function __construct($sisi = 5)
    {
        $this->sisi = $sisi;
        $this->namaBangunDatar = "Persegi";
    }

    public function hitungLuas()
    {
        return $this->sisi * $this->sisi;
    }

    public function hitungKeliling()
    {
        return 4 * $this->sisi;
    }
}
