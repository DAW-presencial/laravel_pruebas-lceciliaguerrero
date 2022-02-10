<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tituloPrimerPost = 'Titulo 1';
        $extractoPrimerPost = 'Extracto 1';
        $contenidoPrimerPost = 'Contenido 1';
        $accesoPrimerPost = 'publico';
        $caducable_comentablePrimerPost = '["caducable", "comentable"]';
        $fechaPrimerPost = '2022-09-30';
        $id_userPrimerPost = 1;
        $dateTimeActualPrimera = Carbon::now();
        DB::insert('insert into posts(titulo, extracto, contenido, acceso, caducable_comentable, fecha, id_user, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [$tituloPrimerPost, $extractoPrimerPost, $contenidoPrimerPost, $accesoPrimerPost, $caducable_comentablePrimerPost, $fechaPrimerPost, $id_userPrimerPost, $dateTimeActualPrimera, $dateTimeActualPrimera]);
    }
}
