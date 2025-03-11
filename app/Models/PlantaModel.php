<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantaModel extends Model
{
    protected $table      = 'plantas';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre', 'variedad', 'descripcion'];

    protected $useTimestamps = true;
 // Nombres de los campos para las fechas
 protected $createdField  = 'created_at';
 protected $updatedField  = 'updated_at';
 protected $deletedField  = 'deleted_at';
 
    // Validaciones (opcional)
    protected $validationRules    = [
        'nombre'     => 'required|min_length[3]|max_length[255]',
        'variedad'   => 'required|min_length[3]|max_length[255]',
        'descripcion' => 'permit_empty'
    ];

    protected $validationMessages = [
        'nombre' => [
            'required' => 'El nombre es obligatorio.',
            'min_length' => 'El nombre debe tener al menos 3 caracteres.'
        ],
        'variedad' => [
            'required' => 'La variedad es obligatoria.',
            'min_length' => 'La variedad debe tener al menos 3 caracteres.'
        ]
    ];

    protected $skipValidation = false;
}
