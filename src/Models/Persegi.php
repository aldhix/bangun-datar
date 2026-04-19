<?php

namespace App\Models;

use App\Models\BangunDatar;

/**
 * Class Persegi
 *
 * Representasi bangun datar persegi (segi empat sama sisi).
 * Luas  = sisi × sisi
 * Keliling = 4 × sisi
 *
 * @package App\Models
 */
class Persegi extends BangunDatar
{
    /**
     * Panjang sisi persegi.
     *
     * @var float|int
     */
    private $sisi;

    /**
     * Membuat instance Persegi dengan panjang sisi tertentu.
     *
     * @param float|int $sisi Panjang sisi persegi (default: 5)
     */
    public function __construct($sisi = 5)
    {
        $this->sisi = $sisi;
        $this->namaBangunDatar = "Persegi";
    }

    /**
     * Menghitung luas persegi.
     *
     * @return float|int Luas persegi (sisi × sisi)
     */
    public function hitungLuas()
    {
        return $this->sisi * $this->sisi;
    }

    /**
     * Menghitung keliling persegi.
     *
     * @return float|int Keliling persegi (4 × sisi)
     */
    public function hitungKeliling()
    {
        return 4 * $this->sisi;
    }
}
