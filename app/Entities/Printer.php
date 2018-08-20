<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Printer.
 *
 * @package namespace App\Entities;
 */
class Printer extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'printers';
    protected $fillable = [
        'sector_id', 'type', 'manufacturer', 'model', 'serial_number', 'bmp_number', 'ip_address', 'tonner', 'year_acquisition', 'status'
    ];

    public function scopeUsable($query)
    {
        return $query->where('status', 'Bom - Em Uso');
    }
   
    public function scopeStock($query)
    {
        return $query->where('status', 'Bom - Estocado');
    }

    public function scopeUnusable($query)
    {
        return $query->where('status', 'Ruim - Sem condições de uso');
    }

    public function scopeUndermaintenance($query)
    {
        return $query->where('status', 'Ruim - Em manutenção');
    }

    public function scopeDisposing($query)
    {
        return $query->where('status', 'Ruim - Em descarga');
    }

    public function sector()
    {
        return $this->belongsTo('App\Entities\Sector', 'sector_id');
    }
}
