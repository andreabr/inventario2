<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Sector.
 *
 * @package namespace App\Entities;
 */
class Sector extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'sectors';
    protected $fillable = [
        'initials', 'in_full', 'parent_sector'
    ];

    public function computer()
    {
        return $this->hasMany('Computer', 'sector_id');
    }

    public function printer()
    {
        return $this->hasMany('Printer', 'sector_id');
    }
}
