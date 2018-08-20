<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Printer;

/**
 * Class PrinterTransformer.
 *
 * @package namespace App\Transformers;
 */
class PrinterTransformer extends TransformerAbstract
{
    /**
     * Transform the Printer entity.
     *
     * @param \App\Entities\Printer $model
     *
     * @return array
     */
    public function transform(Printer $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
