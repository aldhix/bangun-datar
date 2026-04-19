<?php

use App\Models\PersegiPanjang;

describe('PersegiPanjang', function () {

    it('memiliki nama bangun datar "Persegi Panjang"', function () {
        $pp = new PersegiPanjang();

        expect($pp->getNamaBangunDatar())->toBe('Persegi Panjang');
    });

    it('menggunakan nilai default panjang=7 dan lebar=4', function () {
        $pp = new PersegiPanjang();

        expect($pp->hitungLuas())->toBe(28);     // 7 × 4
        expect($pp->hitungKeliling())->toBe(22); // 2 × (7+4)
    });

    it('menghitung luas dengan rumus panjang × lebar', function () {
        expect((new PersegiPanjang(10, 5))->hitungLuas())->toBe(50);
        expect((new PersegiPanjang(3, 8))->hitungLuas())->toBe(24);
        expect((new PersegiPanjang(15, 6))->hitungLuas())->toBe(90);
    });

    it('menghitung keliling dengan rumus 2 × (panjang + lebar)', function () {
        expect((new PersegiPanjang(6, 4))->hitungKeliling())->toBe(20);
        expect((new PersegiPanjang(12, 3))->hitungKeliling())->toBe(30);
        expect((new PersegiPanjang(8, 5))->hitungKeliling())->toBe(26);
    });

    it('mendukung nilai desimal', function () {
        $pp = new PersegiPanjang(5.5, 2.5);

        expect($pp->hitungLuas())->toBe(13.75);
        expect($pp->hitungKeliling())->toBe(16.0);
    });

    it('merupakan turunan dari BangunDatar', function () {
        expect(new PersegiPanjang())->toBeInstanceOf(\App\Models\BangunDatar::class);
    });

    it('menghitung luas dan keliling dengan berbagai dimensi', function (int $p, int $l, int $luas, int $keliling) {
        $pp = new PersegiPanjang($p, $l);

        expect($pp->hitungLuas())->toBe($luas);
        expect($pp->hitungKeliling())->toBe($keliling);
    })->with([
        'p=5,  l=3'  => [5, 3, 15, 16],
        'p=10, l=7'  => [10, 7, 70, 34],
        'p=8,  l=2'  => [8, 2, 16, 20],
        'p=15, l=9'  => [15, 9, 135, 48],
        'p=20, l=10' => [20, 10, 200, 60],
    ]);
});
