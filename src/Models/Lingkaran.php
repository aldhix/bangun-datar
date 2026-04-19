<?php

namespace App\Models;

use App\Models\BangunDatar;

class Lingkaran extends BangunDatar
{
    private $jariJari;

    public function __construct($jariJari = 3)
    {
        $this->jariJari = $jariJari;
        $this->namaBangunDatar = "Lingkaran";
    }

    public function hitungLuas()
    {
        return pi() * pow($this->jariJari, 2);
    }

    public function hitungKeliling()
    {
        return 2 * pi() * $this->jariJari;
    }
}
