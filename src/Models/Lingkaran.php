<?php

namespace App\Models;

use App\Models\BangunDatar;

/**
 * Class Lingkaran
 *
 * Representasi bangun datar lingkaran.
 * Luas     = π × r²
 * Keliling = 2 × π × r
 *
 * @package App\Models
 */
class Lingkaran extends BangunDatar
{
    /**
     * Panjang jari-jari lingkaran.
     *
     * @var float|int
     */
    private $jariJari;

    /**
     * Membuat instance Lingkaran dengan jari-jari tertentu.
     *
     * @param float|int $jariJari Jari-jari lingkaran (default: 3)
     */
    public function __construct($jariJari = 3)
    {
        $this->jariJari = $jariJari;
        $this->namaBangunDatar = "Lingkaran";
    }

    /**
     * Menghitung luas lingkaran.
     *
     * @return float Luas lingkaran (π × r²)
     */
    public function hitungLuas()
    {
        return pi() * pow($this->jariJari, 2);
    }

    /**
     * Menghitung keliling (circumference) lingkaran.
     *
     * @return float Keliling lingkaran (2 × π × r)
     */
    public function hitungKeliling()
    {
        return 2 * pi() * $this->jariJari;
    }
}
