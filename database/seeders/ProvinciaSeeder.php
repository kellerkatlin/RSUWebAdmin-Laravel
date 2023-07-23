<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provincias = [
            ['provincia' => 'Chachapoyas', 'estado' => 1, 'idregion' => 1],
            ['provincia' => 'Bagua', 'estado' => 1, 'idregion' => 1],
            ['provincia' => 'Bongará', 'estado' => 1, 'idregion' => 1],
            ['provincia' => 'Condorcanqui', 'estado' => 1, 'idregion' => 1],
            ['provincia' => 'Luya', 'estado' => 1, 'idregion' => 1],
            ['provincia' => 'Rodríguez de Mendoza', 'estado' => 1, 'idregion' => 1],
            ['provincia' => 'Utcubamba', 'estado' => 1, 'idregion' => 1],
            ['provincia' => 'Huaraz', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Aija', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Antonio Raymondi', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Asunción', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Bolognesi', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Carhuaz', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Carlos Fermín Fitzcarrald', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Casma', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Corongo', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Huari', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Huarmey', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Huaylas', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Mariscal Luzuriaga', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Ocros', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Pallasca', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Pomabamba', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Recuay', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Santa', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Sihuas', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Yungay', 'estado' => 1, 'idregion' => 2],
            ['provincia' => 'Abancay', 'estado' => 1, 'idregion' => 3],
            ['provincia' => 'Andahuaylas', 'estado' => 1, 'idregion' => 3],
            ['provincia' => 'Antabamba', 'estado' => 1, 'idregion' => 3],
            ['provincia' => 'Aymaraes', 'estado' => 1, 'idregion' => 3],
            ['provincia' => 'Cotabambas', 'estado' => 1, 'idregion' => 3],
            ['provincia' => 'Chincheros', 'estado' => 1, 'idregion' => 3],
            ['provincia' => 'Grau', 'estado' => 1, 'idregion' => 3],
            ['provincia' => 'Arequipa', 'estado' => 1, 'idregion' => 4],
            ['provincia' => 'Camaná', 'estado' => 1, 'idregion' => 4],
            ['provincia' => 'Caravelí', 'estado' => 1, 'idregion' => 4],
            ['provincia' => 'Castilla', 'estado' => 1, 'idregion' => 4],
            ['provincia' => 'Caylloma', 'estado' => 1, 'idregion' => 4],
            ['provincia' => 'Condesuyos', 'estado' => 1, 'idregion' => 4],
            ['provincia' => 'Islay', 'estado' => 1, 'idregion' => 4],
            ['provincia' => 'La Uniòn', 'estado' => 1, 'idregion' => 4],
            ['provincia' => 'Huamanga', 'estado' => 1, 'idregion' => 5],
            ['provincia' => 'Cangallo', 'estado' => 1, 'idregion' => 5],
            ['provincia' => 'Huanca Sancos', 'estado' => 1, 'idregion' => 5],
            ['provincia' => 'Huanta', 'estado' => 1, 'idregion' => 5],
            ['provincia' => 'La Mar', 'estado' => 1, 'idregion' => 5],
            ['provincia' => 'Lucanas', 'estado' => 1, 'idregion' => 5],
            ['provincia' => 'Parinacochas', 'estado' => 1, 'idregion' => 5],
            ['provincia' => 'Pàucar del Sara Sara', 'estado' => 1, 'idregion' => 5],
            ['provincia' => 'Sucre', 'estado' => 1, 'idregion' => 5],
            ['provincia' => 'Víctor Fajardo', 'estado' => 1, 'idregion' => 5],
            ['provincia' => 'Vilcas Huamán', 'estado' => 1, 'idregion' => 5],
            ['provincia' => 'Cajamarca', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'Cajabamba', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'Celendín', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'Chota', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'Contumazá', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'Cutervo', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'Hualgayoc', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'Jaén', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'San Ignacio', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'San Marcos', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'San Miguel', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'San Pablo', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'Santa Cruz', 'estado' => 1, 'idregion' => 6],
            ['provincia' => 'Prov. Const. del Callao', 'estado' => 1, 'idregion' => 7],
            ['provincia' => 'Cusco', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Acomayo', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Anta', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Calca', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Canas', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Canchis', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Chumbivilcas', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Espinar', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'La Convención', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Paruro', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Paucartambo', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Quispicanchi', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Urubamba', 'estado' => 1, 'idregion' => 8],
            ['provincia' => 'Huancavelica', 'estado' => 1, 'idregion' => 9],
            ['provincia' => 'Acobamba', 'estado' => 1, 'idregion' => 9],
            ['provincia' => 'Angaraes', 'estado' => 1, 'idregion' => 9],
            ['provincia' => 'Castrovirreyna', 'estado' => 1, 'idregion' => 9],
            ['provincia' => 'Churcampa', 'estado' => 1, 'idregion' => 9],
            ['provincia' => 'Huaytará', 'estado' => 1, 'idregion' => 9],
            ['provincia' => 'Tayacaja', 'estado' => 1, 'idregion' => 9],
            ['provincia' => 'Huánuco', 'estado' => 1, 'idregion' => 10],
            ['provincia' => 'Ambo', 'estado' => 1, 'idregion' => 10],
            ['provincia' => 'Dos de Mayo', 'estado' => 1, 'idregion' => 10],
            ['provincia' => 'Huacaybamba', 'estado' => 1, 'idregion' => 10],
            ['provincia' => 'Huamalíes', 'estado' => 1, 'idregion' => 10],
            ['provincia' => 'Leoncio Prado', 'estado' => 1, 'idregion' => 10],
            ['provincia' => 'Marañón', 'estado' => 1, 'idregion' => 10],
            ['provincia' => 'Pachitea', 'estado' => 1, 'idregion' => 10],
            ['provincia' => 'Puerto Inca', 'estado' => 1, 'idregion' => 10],
            ['provincia' => 'Lauricocha', 'estado' => 1, 'idregion' => 10],
            ['provincia' => 'Yarowilca', 'estado' => 1, 'idregion' => 10],
            ['provincia' => 'Ica', 'estado' => 1, 'idregion' => 11],
            ['provincia' => 'Chincha', 'estado' => 1, 'idregion' => 11],
            ['provincia' => 'Nazca', 'estado' => 1, 'idregion' => 11],
            ['provincia' => 'Palpa', 'estado' => 1, 'idregion' => 11],
            ['provincia' => 'Pisco', 'estado' => 1, 'idregion' => 11],
            ['provincia' => 'Huancayo', 'estado' => 1, 'idregion' => 12],
            ['provincia' => 'Concepción', 'estado' => 1, 'idregion' => 12],
            ['provincia' => 'Chanchamayo', 'estado' => 1, 'idregion' => 12],
            ['provincia' => 'Jauja', 'estado' => 1, 'idregion' => 12],
            ['provincia' => 'Junín', 'estado' => 1, 'idregion' => 12],
            ['provincia' => 'Satipo', 'estado' => 1, 'idregion' => 12],
            ['provincia' => 'Tarma', 'estado' => 1, 'idregion' => 12],
            ['provincia' => 'Yauli', 'estado' => 1, 'idregion' => 12],
            ['provincia' => 'Chupaca', 'estado' => 1, 'idregion' => 12],
            ['provincia' => 'Trujillo', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Ascope', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Bolívar', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Chepén', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Julcán', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Otuzco', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Pacasmayo', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Pataz', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Sánchez Carrión', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Santiago de Chuco', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Gran Chimú', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Virú', 'estado' => 1, 'idregion' => 13],
            ['provincia' => 'Chiclayo', 'estado' => 1, 'idregion' => 14],
            ['provincia' => 'Ferreñafe', 'estado' => 1, 'idregion' => 14],
            ['provincia' => 'Lambayeque', 'estado' => 1, 'idregion' => 14],
            ['provincia' => 'Lima', 'estado' => 1, 'idregion' => 15],
            ['provincia' => 'Barranca', 'estado' => 1, 'idregion' => 15],
            ['provincia' => 'Cajatambo', 'estado' => 1, 'idregion' => 15],
            ['provincia' => 'Canta', 'estado' => 1, 'idregion' => 15],
            ['provincia' => 'Cañete', 'estado' => 1, 'idregion' => 15],
            ['provincia' => 'Huaral', 'estado' => 1, 'idregion' => 15],
            ['provincia' => 'Huarochirí', 'estado' => 1, 'idregion' => 15],
            ['provincia' => 'Huaura', 'estado' => 1, 'idregion' => 15],
            ['provincia' => 'Oyón', 'estado' => 1, 'idregion' => 15],
            ['provincia' => 'Yauyos', 'estado' => 1, 'idregion' => 15],
            ['provincia' => 'Maynas', 'estado' => 1, 'idregion' => 16],
            ['provincia' => 'Alto Amazonas', 'estado' => 1, 'idregion' => 16],
            ['provincia' => 'Loreto', 'estado' => 1, 'idregion' => 16],
            ['provincia' => 'Mariscal Ramón Castilla', 'estado' => 1, 'idregion' => 16],
            ['provincia' => 'Requena', 'estado' => 1, 'idregion' => 16],
            ['provincia' => 'Ucayali', 'estado' => 1, 'idregion' => 16],
            ['provincia' => 'Datem del Marañón', 'estado' => 1, 'idregion' => 16],
            ['provincia' => 'Putumayo', 'estado' => 1, 'idregion' => 16],
            ['provincia' => 'Tambopata', 'estado' => 1, 'idregion' => 17],
            ['provincia' => 'Manu', 'estado' => 1, 'idregion' => 17],
            ['provincia' => 'Tahuamanu', 'estado' => 1, 'idregion' => 17],
            ['provincia' => 'Mariscal Nieto', 'estado' => 1, 'idregion' => 18],
            ['provincia' => 'General Sánchez Cerro', 'estado' => 1, 'idregion' => 18],
            ['provincia' => 'Ilo', 'estado' => 1, 'idregion' => 18],
            ['provincia' => 'Pasco', 'estado' => 1, 'idregion' => 19],
            ['provincia' => 'Daniel Alcides Carrión', 'estado' => 1, 'idregion' => 19],
            ['provincia' => 'Oxapampa', 'estado' => 1, 'idregion' => 19],
            ['provincia' => 'Piura', 'estado' => 1, 'idregion' => 20],
            ['provincia' => 'Ayabaca', 'estado' => 1, 'idregion' => 20],
            ['provincia' => 'Huancabamba', 'estado' => 1, 'idregion' => 20],
            ['provincia' => 'Morropón', 'estado' => 1, 'idregion' => 20],
            ['provincia' => 'Paita', 'estado' => 1, 'idregion' => 20],
            ['provincia' => 'Sullana', 'estado' => 1, 'idregion' => 20],
            ['provincia' => 'Talara', 'estado' => 1, 'idregion' => 20],
            ['provincia' => 'Sechura', 'estado' => 1, 'idregion' => 20],
            ['provincia' => 'Puno', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'Azángaro', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'Carabaya', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'Chucuito', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'El Collao', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'Huancané', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'Lampa', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'Melgar', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'Moho', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'San Antonio de Putina', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'San Román', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'Sandia', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'Yunguyo', 'estado' => 1, 'idregion' => 21],
            ['provincia' => 'Moyobamba', 'estado' => 1, 'idregion' => 22],
            ['provincia' => 'Bellavista', 'estado' => 1, 'idregion' => 22],
            ['provincia' => 'El Dorado', 'estado' => 1, 'idregion' => 22],
            ['provincia' => 'Huallaga', 'estado' => 1, 'idregion' => 22],
            ['provincia' => 'Lamas', 'estado' => 1, 'idregion' => 22],
            ['provincia' => 'Mariscal Cáceres', 'estado' => 1, 'idregion' => 22],
            ['provincia' => 'Picota', 'estado' => 1, 'idregion' => 22],
            ['provincia' => 'Rioja', 'estado' => 1, 'idregion' => 22],
            ['provincia' => 'San Martín', 'estado' => 1, 'idregion' => 22],
            ['provincia' => 'Tocache', 'estado' => 1, 'idregion' => 22],
            ['provincia' => 'Tacna', 'estado' => 1, 'idregion' => 23],
            ['provincia' => 'Candarave', 'estado' => 1, 'idregion' => 23],
            ['provincia' => 'Jorge Basadre', 'estado' => 1, 'idregion' => 23],
            ['provincia' => 'Tarata', 'estado' => 1, 'idregion' => 23],
            ['provincia' => 'Tumbes', 'estado' => 1, 'idregion' => 24],
            ['provincia' => 'Contralmirante Villar', 'estado' => 1, 'idregion' => 24],
            ['provincia' => 'Zarumilla', 'estado' => 1, 'idregion' => 24],
            ['provincia' => 'Coronel Portillo', 'estado' => 1, 'idregion' => 25],
            ['provincia' => 'Atalaya', 'estado' => 1, 'idregion' => 25],
            ['provincia' => 'Padre Abad', 'estado' => 1, 'idregion' => 25],
            ['provincia' => 'Purús', 'estado' => 1, 'idregion' => 25],
        ];
        DB::table('provincias')->insert($provincias);
    }
}
