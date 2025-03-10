<?php 
namespace App\Models;
use CodeIgniter\Model;
class TerrenoModel extends Model
{
    protected $table = 'terrenos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'coordenadas', 'color','relleno'];

    // Optional: specify return type
    protected $returnType = 'array';

    // Optional: enable timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Optional: validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    public function obtenerTerrenoPorId($id)
    {
        return $this->where('id', $id)->first();  // Devuelve el primer registro con ese id
    }
}