<?php

use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Prefix
     * @var string
     */
    public $prefix = 'csv';

    /**
     * Tables
     * @var array
     */
    public $tables = [
        'countries' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'departments' => [
            'columns' => 'id, country_id, name, code, @created_at, @updated_at'
        ],
        'municipalities' => [
            'columns' => 'id, department_id, name, code, @created_at, @updated_at'
        ],
        'documentos' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'tipologias' => [
            'columns' => 'id, nombre_tipologia, code, @created_at, @updated_at'
        ],
        'ocupaciones' => [
            'columns' => 'id, nombre_ocupacion, code, @created_at, @updated_at'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach ($this->tables as $key => $table) {
            DB::connection()
                ->getpdo()
                ->exec("LOAD DATA LOCAL INFILE '".public_path($this->prefix.DIRECTORY_SEPARATOR."{$key}.{$this->prefix}")."' INTO TABLE $key({$table['columns']}) SET created_at = NOW(), updated_at = NOW()");
        }
    }
}
