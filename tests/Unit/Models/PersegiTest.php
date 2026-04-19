<?php

use App\Models\Persegi;

describe('Persegi', function () {

    it('memiliki nama bangun datar "Persegi"', function () {
        $persegi = new Persegi();

        expect($persegi->getNamaBangunDatar())->toBe('Persegi');
    });

    it('menggunakan nilai sisi default 5', function () {
        $persegi = new Persegi();

        expect($persegi->hitungLuas())->toBe(25);
        expect($persegi->hitungKeliling())->toBe(20);
    });

    it('menghitung luas dengan rumus sisi × sisi', function () {
        expect((new Persegi(4))->hitungLuas())->toBe(16);
        expect((new Persegi(6))->hitungLuas())->toBe(36);
        expect((new Persegi(10))->hitungLuas())->toBe(100);
    });

    it('menghitung keliling dengan rumus 4 × sisi', function () {
        expect((new Persegi(3))->hitungKeliling())->toBe(12);
        expect((new Persegi(7))->hitungKeliling())->toBe(28);
        expect((new Persegi(10))->hitungKeliling())->toBe(40);
    });

    it('mendukung nilai sisi desimal', function () {
        $persegi = new Persegi(2.5);

        expect($persegi->hitungLuas())->toBe(6.25);
        expect($persegi->hitungKeliling())->toBe(10.0);
    });

    it('merupakan turunan dari BangunDatar', function () {
        expect(new Persegi())->toBeInstanceOf(\App\Models\BangunDatar::class);
    });

    it('menghitung luas dan keliling dengan berbagai nilai sisi', function (int $sisi, int $luas, int $keliling) {
        $persegi = new Persegi($sisi);

        expect($persegi->hitungLuas())->toBe($luas);
        expect($persegi->hitungKeliling())->toBe($keliling);
    })->with([
        'sisi 3'  => [3, 9, 12],
        'sisi 8'  => [8, 64, 32],
        'sisi 9'  => [9, 81, 36],
        'sisi 11' => [11, 121, 44],
        'sisi 15' => [15, 225, 60],
    ]);
});
