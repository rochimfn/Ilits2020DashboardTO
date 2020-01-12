<?php

use Illuminate\Database\Seeder;
use App\Departemen;
class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departemen=[
            'Fisika',
            'Matematika',
            'Statistika',
            'Kimia',
            'Biologi',
            'Akutaria',
            'Teknik Mesin',
            'Teknik Kimia',
            'Teknik Fisika',
            'Teknik Industri',
            'Teknik Material dan Metalurgi',
            'Teknik Sipil',
            'Arsitektur',
            'Teknik Lingkungan',
            'Perencanaan Wilayah Kota',
            'Teknik Geomatika',
            'Teknik Geofisika',
            'Teknik Perkapalan',
            'Teknik Sistem Perkapalan',
            'Teknik Kelautan',
            'Teknik Transportasi Laut',
            'Teknik Elektro',
            'Teknik Biomedik',
            'Teknik Komputer',
            'Teknik Informatika',
            'Sistem Informasi',
            'Teknologi Informasi',
            'Desain Produk',
            'Desain Interior',
            'Desain Komunikasi Visual',
            'Manajemen Bisnis',
            'Studi Pembangunan',
            'Tekin Infrastruktur Sipil',
            'Teknik Mesin Industri',
            'Teknik Elektro Otomasi',
            'Teknik Kimia Industri',
            'Teknik Instrumentasi',
            'Statistika Bisnis'
        ];
        Departemen::create([
            'id'=>0,
            'nama'=>'Belum Memilih'
        ]);
        $x=1;
        foreach($departemen as $d){
            Departemen::create([
                'id'=>$x,
                'nama'=>$d
            ]);
            $x++;
        }
    }
}
