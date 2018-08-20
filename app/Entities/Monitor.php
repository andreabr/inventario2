<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Monitor.
 *
 * @package namespace App\Entities;
 */
class Monitor extends Model implements Transformable
{
    use TransformableTrait;

    /**public
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'monitors';
    protected $fillable = [
        'manufacturer', 'model', 'screen_size', 'sector_id', 'status', 'serial_number', 'bmp_number', 'year_acquisition'
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
