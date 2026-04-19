<?php

namespace App\Database;

use PDO;
use App\Models\BangunDatar;

class BangunDatarModel extends Koneksi
{
    public function getAllBangunDatar(): array
    {
        $stmt = $this->getConnection()->prepare("SELECT * FROM bangun_datar ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBangunDatarById(int $id): array|false
    {
        $stmt = $this->getConnection()->prepare("SELECT * FROM bangun_datar WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertBangunDatar(BangunDatar $bangunDatar): bool
    {
        $stmt = $this->getConnection()->prepare(
            "INSERT INTO bangun_datar (nama, luas, keliling) VALUES (:nama, :luas, :keliling)"
        );
        $stmt->bindValue(':nama', $bangunDatar->getNamaBangunDatar());
        $stmt->bindValue(':luas', $bangunDatar->hitungLuas());
        $stmt->bindValue(':keliling', $bangunDatar->hitungKeliling());
        return $stmt->execute();
    }

    public function updateBangunDatar(int $id, array $data): bool
    {
        $stmt = $this->getConnection()->prepare(
            "UPDATE bangun_datar SET nama = :nama, luas = :luas, keliling = :keliling WHERE id = :id"
        );
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nama', $data['nama']);
        $stmt->bindValue(':luas', $data['luas']);
        $stmt->bindValue(':keliling', $data['keliling']);
        return $stmt->execute();
    }

    public function deleteBangunDatar(int $id): bool
    {
        $stmt = $this->getConnection()->prepare("DELETE FROM bangun_datar WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
