<?php

namespace App\Models;

use App\Models\BangunDatar;

/**
 * Class PersegiPanjang
 *
 * Representasi bangun datar persegi panjang.
 * Luas     = panjang × lebar
 * Keliling = 2 × (panjang + lebar)
 *
 * @package App\Models
 */
class PersegiPanjang extends BangunDatar
{
    /**
     * Panjang sisi horizontal persegi panjang.
     *
     * @var float|int
     */
    private $panjang;

    /**
     * Panjang sisi vertikal persegi panjang.
     *
     * @var float|int
     */
    private $lebar;

    /**
     * Membuat instance PersegiPanjang dengan dimensi tertentu.
     *
     * @param float|int $panjang Panjang persegi panjang (default: 7)
     * @param float|int $lebar   Lebar persegi panjang (default: 4)
     */
    public function __construct($panjang = 7, $lebar = 4)
    {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
        $this->namaBangunDatar = "Persegi Panjang";
    }

    /**
     * Menghitung luas persegi panjang.
     *
     * @return float|int Luas persegi panjang (panjang × lebar)
     */
    public function hitungLuas()
    {
        return $this->panjang * $this->lebar;
    }

    /**
     * Menghitung keliling persegi panjang.
     *
     * @return float|int Keliling persegi panjang (2 × (panjang + lebar))
     */
    public function hitungKeliling()
    {
        return 2 * ($this->panjang + $this->lebar);
    }
}
