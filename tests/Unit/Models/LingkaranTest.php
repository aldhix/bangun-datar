<?php

use App\Models\Lingkaran;

describe('Lingkaran', function () {

    it('memiliki nama bangun datar "Lingkaran"', function () {
        $lingkaran = new Lingkaran();

        expect($lingkaran->getNamaBangunDatar())->toBe('Lingkaran');
    });

    it('menggunakan nilai jari-jari default 3', function () {
        $lingkaran = new Lingkaran();

        expect($lingkaran->hitungLuas())->toBe(pi() * pow(3, 2));
        expect($lingkaran->hitungKeliling())->toBe(2 * pi() * 3);
    });

    it('menghitung luas dengan rumus π × r²', function () {
        expect((new Lingkaran(1))->hitungLuas())->toBe(pi() * pow(1, 2));
        expect((new Lingkaran(5))->hitungLuas())->toBe(pi() * pow(5, 2));
        expect((new Lingkaran(10))->hitungLuas())->toBe(pi() * pow(10, 2));
    });

    it('menghitung keliling dengan rumus 2 × π × r', function () {
        expect((new Lingkaran(1))->hitungKeliling())->toBe(2 * pi() * 1);
        expect((new Lingkaran(7))->hitungKeliling())->toBe(2 * pi() * 7);
        expect((new Lingkaran(10))->hitungKeliling())->toBe(2 * pi() * 10);
    });

    it('hasil luas dan keliling bertipe float', function () {
        $lingkaran = new Lingkaran(5);

        expect($lingkaran->hitungLuas())->toBeFloat();
        expect($lingkaran->hitungKeliling())->toBeFloat();
    });

    it('merupakan turunan dari BangunDatar', function () {
        expect(new Lingkaran())->toBeInstanceOf(\App\Models\BangunDatar::class);
    });

    it('menghitung luas dan keliling dengan berbagai jari-jari', function (float $r) {
        $lingkaran = new Lingkaran($r);

        expect($lingkaran->hitungLuas())->toBe(pi() * pow($r, 2));
        expect($lingkaran->hitungKeliling())->toBe(2 * pi() * $r);
    })->with([
        'r=1'  => [1.0],
        'r=2'  => [2.0],
        'r=5'  => [5.0],
        'r=7'  => [7.0],
        'r=14' => [14.0],
    ]);
});
