<?php

namespace App\Controllers;

use App\Database\BangunDatarModel;
use App\Models\Persegi;
use App\Models\PersegiPanjang;
use App\Models\Lingkaran;

class BangunDatarController
{
    private BangunDatarModel $model;

    public function __construct()
    {
        $this->model = new BangunDatarModel();
    }

    public function index()
    {
        $bidangDatars = $this->model->getAllBangunDatar();
        require __DIR__ . '/../views/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../views/create.php';
    }

    public function store(array $data)
    {
        $jenis = $data['jenis'] ?? '';

        switch ($jenis) {
            case 'persegi':
                $shape = new Persegi((float) ($data['sisi'] ?? 0));
                break;
            case 'persegi_panjang':
                $shape = new PersegiPanjang((float) ($data['panjang'] ?? 0), (float) ($data['lebar'] ?? 0));
                break;
            case 'lingkaran':
                $shape = new Lingkaran((float) ($data['jari_jari'] ?? 0));
                break;
            default:
                header('Location: index.php');
                exit;
        }

        $this->model->insertBangunDatar($shape);
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data berhasil ditambahkan.'];
        header('Location: index.php');
        exit;
    }

    public function edit(int $id)
    {
        $bangunDatar = $this->model->getBangunDatarById($id);
        if (!$bangunDatar) {
            header('Location: index.php');
            exit;
        }
        require __DIR__ . '/../views/edit.php';
    }

    public function update(int $id, array $data)
    {
        $this->model->updateBangunDatar($id, $data);
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data berhasil diperbarui.'];
        header('Location: index.php');
        exit;
    }

    public function delete(int $id)
    {
        $this->model->deleteBangunDatar($id);
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data berhasil dihapus.'];
        header('Location: index.php');
        exit;
    }
}
