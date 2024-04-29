<?php

namespace App\Models;

use App\Models\Berkas;
use App\Models\DataLahan;
use App\Models\Komoditas;
use App\Models\Persetujuan;
use App\Models\JenisKelamin;
use App\Models\KelompokTani;
use App\Models\KategoriPetani;
use App\Models\Pemerintah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Petani extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [
        'id_petani',
    ];

    protected $fillable =[
        'nama_lengkap',
        'nik',
        'jenis_kelamins_id',
        'tempat_lahir',
        'tanggal_lahir',
        'jalan',
        'kecamatan',
        'kota',
        'komoditas_id',
        'vol_komoditas',
        'luas_lahan',
        'titik_koor_lahan',
        'no_telp',
        'kategori_petanis_id',
        'scan_ktp',
        'scan_kk',
        'foto_lahan',
        'data_lahans_id',
        'berkas_id',
        'persetejuans_id',
        'komentar',
        'pemerintah_id',
        'kelompok_tani_id'
    ];

    public function Pemerintah()
    {
        return $this->belongsTo(Pemerintah::class);
    }

    public function KelompokTani()
    {
        return $this->belongsTo(KelompokTani::class);
    }

    public function Komoditas()
    {
        return $this->belongsTo(Komoditas::class);
    }

    public function JenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class);
    }

    public function persetujuan()
    {
        return $this->belongsTo(Persetujuan::class);
    }

    public function KategoriPetani()
    {
        return $this->belongsTo(KategoriPetani::class);
    }

    public function berkas()
    {
        return $this->belongsTo(Berkas::class);
    }

    public function dataLahan()
    {
        return $this->belongsTo(DataLahan::class);
    }
}


