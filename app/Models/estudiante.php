<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'est_cedula';
    protected $fillable = ['est_cedula','est_nombre','est_apellido','est_direccion','est_telefono'];
}
