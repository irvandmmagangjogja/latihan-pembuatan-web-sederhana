<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        Student::create([
            'name' => 'Andi',
            'birth_place' => 'Jakarta',
            'birth_date' => '2005-04-10',
            'school' => 'SMA Negeri 1 Jakarta',
            'description' => 'Siswa berprestasi tahun 2023',
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);
        Student::create(
            [
                'name' => 'Budi',
                'birth_place' => 'Bandung',
                'birth_date' => '2006-05-15',
                'school' => 'SMA Negeri 3 Bandung',
                'description' => 'Siswa aktif dalam olahraga',
                // 'created_at' => Carbon::now(),
                // 'updated_at' => Carbon::now(),
            ]
        );
        
    }
}
