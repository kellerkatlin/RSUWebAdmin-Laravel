<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regiones = [
            ['region' => 'Amazonas', 'estado' => 1],
            ['region' => 'Áncash', 'estado' => 1],
            ['region' => 'Apurímac', 'estado' => 1],
            ['region' => 'Arequipa', 'estado' => 1],
            ['region' => 'Ayacucho', 'estado' => 1],
            ['region' => 'Cajamarca', 'estado' => 1],
            ['region' => 'Callao', 'estado' => 1],
            ['region' => 'Cusco', 'estado' => 1],
            ['region' => 'Huancavelica', 'estado' => 1],
            ['region' => 'Huánuco', 'estado' => 1],
            ['region' => 'Ica', 'estado' => 1],
            ['region' => 'Junín', 'estado' => 1],
            ['region' => 'La Libertad', 'estado' => 1],
            ['region' => 'Lambayeque', 'estado' => 1],
            ['region' => 'Lima', 'estado' => 1],
            ['region' => 'Loreto', 'estado' => 1],
            ['region' => 'Madre de Dios', 'estado' => 1],
            ['region' => 'Moquegua', 'estado' => 1],
            ['region' => 'Pasco', 'estado' => 1],
            ['region' => 'Piura', 'estado' => 1],
            ['region' => 'Puno', 'estado' => 1],
            ['region' => 'San Martín', 'estado' => 1],
            ['region' => 'Tacna', 'estado' => 1],
            ['region' => 'Tumbes', 'estado' => 1],
            ['region' => 'Ucayali', 'estado' => 1],
        ];
        DB::table('regiones')->insert($regiones);
    }
}
