<?php

namespace App\Modulos\Planilla;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Contrato extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $table = 'Contratos';
    protected $primaryKey = 'Id_Contrato';
    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = ['recursos', 'saldos', 'suspenciones'];

    public function contratista()
    {
    	return $this->belongsTo('App\Modulos\Planilla\Contratista', 'Id_Contratista');
    }

    public function recursos()
    {
        return $this->hasMany('App\Modulos\Planilla\Recurso', 'Id_Contrato');
    }

    public function saldos()
    {
        return $this->hasMany('App\Modulos\Planilla\Saldo', 'Id_Contrato');
    }

    public function suspenciones()
    {
        return $this->hasMany('App\Modulos\Planilla\Suspencion', 'Id_Contrato');
    }
}
