<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Computer;

/**
 * Class ComputerTransformer.
 *
 * @package namespace App\Transformers;
 */
class ComputerTransformer extends TransformerAbstract
{
    /**
     * Transform the Computer entity.
     *
     * @param \App\Entities\Computer $model
     *
     * @return array
     */
    public function transform(Computer $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
