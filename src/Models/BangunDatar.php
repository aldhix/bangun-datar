<?php

namespace App\Models;

use App\Models\InterfaceHitung;

/**
 * Class BangunDatar
 *
 * Kelas abstrak yang menjadi induk dari semua bangun datar.
 * Menyimpan nama bangun datar dan menyediakan accessor-nya.
 *
 * @package App\Models
 */
class BangunDatar extends InterfaceHitung
{
    /**
     * Nama bangun datar (misalnya: "Persegi", "Lingkaran").
     *
     * @var string
     */
    protected $namaBangunDatar;

    /**
     * Mengembalikan nama bangun datar.
     *
     * @return string Nama bangun datar
     */
    public function getNamaBangunDatar()
    {
        return $this->namaBangunDatar;
    }
}
