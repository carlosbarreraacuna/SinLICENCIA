<?php

namespace App\Imports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Carbon\Carbon;

class ProductsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
{
    $producto = new Producto([
        'codigo' => $row['codigo'],
        'nombre' => $row['nombre'],
        'stock' => $row['stock'],
        'descripcion' => $row['descripcion'],
        'marca_id' => $row['marca_id'],
        'estado' => $row['estado'],
        'presentacione_id' => $row['presentacione_id'],
    ]);

    $producto->save();
}
    // public function model(array $row)
    // {

    //     $producto = new Producto([
    //         'codigo' => $row['codigo'],
    //         'nombre' => $row['nombre'],
    //         'stock' => $row['stock'],
    //         'descripcion' => $row['descripcion'],
    //         'marca_id' => $row['marca_id'],
    //         'estado' => $row['estado'],
    //         'presentacione_id' => $row['presentacione_id'],
    //     ]);

    //     $producto->save();
    //     // $producto = Producto::where('codigo', $row['codigo'])->first();

    //     // if ($producto) {
    //     //     $producto->update([
    //     //         'nombre' => $row['nombre'],
    //     //         'stock' => $row['stock'],
    //     //         'descripcion' => $row['descripcion'],
    //     //         //'fecha_vencimiento' => $fechaVencimiento,
    //     //         'img_path' => $row['img_path'],
    //     //         'marca_id' => $row['marca_id'],
    //     //         'estado' => $row['estado'],
    //     //         'presentacione_id' => $row['presentacione_id'],
    //     //     ]);
    //     // } else {
    //     //     $producto = new Producto([
    //     //         'codigo' => $row['codigo'],
    //     //         'nombre' => $row['nombre'],
    //     //         'stock' => $row['stock'],
    //     //         'descripcion' => $row['descripcion'],
    //     //         //'fecha_vencimiento' => $fechaVencimiento,
    //     //         //'img_path' => $row['img_path'],
    //     //         'marca_id' => $row['marca_id'],
    //     //         'estado' => $row['estado'],
    //     //         'presentacione_id' => $row['presentacione_id'],
    //     //     ]);

    //     // $producto = new Producto([
    //     //     'codigo' => $row['codigo'],
    //     //     'nombre' => $row['nombre'],
    //     //     'stock' => $row['stock'],
    //     //     'descripcion' => $row['descripcion'],
    //     //     //'fecha_vencimiento' => $row['fecha_vencimiento'],
    //     //     //'img_path' => $row['img_path'],
    //     //     'marca_id' => $row['marca_id'],
    //     //     'estado' => $row['estado'],
    //     //     'presentacione_id' => $row['presentacione_id'],
    //     // ]);

    //     // $producto->save();
    // }

    public function batchSize(): int
    {
        return 4000; // tamaño de registros (laravel excel)
    }

    public function chunkSize(): int
    {

        return 4000; // tamaño fde archivos (laravel excel)
    }
}
