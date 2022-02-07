<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Core\File;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $arrozBomba = Product::create([
            'name' => 'Arroz',
            'description' => 'Arroz bomba',
            'photo' => 'arroz-bomba.png',
            'trademark_name' => 'La fallera',
            'trademark_email' => 'atencionalcliente@lafallera.es',
            'date_expiry' => '2022-02-17',
            'type_stock' => 'alimentario',
            'type' => ["supermercado"],
            'available_stock' => '3000',
            'minimum_stock' => '100',
            'id_user' => 1,
            'type_product_unit' => 'gramos'
        ]);

        $SensiflexDeepBlueNitriloSinPolvo = Product::create([
            'name' => 'Sensiflex® Deep Blue Nitrilo sin polvo',
            'description' => 'Para tareas que requieran una alta sensibilidad táctil',
            'photo' => 'sensiflex-deep-blue-nitrilo-sin-polvo.png',
            'trademark_name' => 'Bimedica',
            'trademark_email' => 'bimedica@bimedica.com',
            'date_expiry' => '2023-05-10',
            'type_stock' => 'sanitario',
            'type' => ["hospital", "centro_salud", "farmacia"],
            'available_stock' => '100',
            'minimum_stock' => '50',
            'id_user' => 1,
            'type_product_unit' => 'unidades'
        ]);

        $SensiflexDeepBlueNitriloSinPolvo = Product::create([
            'name' => 'Mascarilla FFP2 NR plegable',
            'description' => 'Indicadas para proteger al usuario de la inhalación de partículas y agentes contaminantes',
            'photo' => 'mascarilla-ffp2.png',
            'trademark_name' => 'Bimedica',
            'trademark_email' => 'bimedica@bimedica.com',
            'date_expiry' => '2023-05-20',
            'type_stock' => 'sanitario',
            'type' => ["hospital", "centro_salud", "farmacia"],
            'available_stock' => '500',
            'minimum_stock' => '100',
            'id_user' => 1,
            'type_product_unit' => 'unidades'
        ]);
    }
}
