<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Monitor;

/**
 * Class MonitorTransformer.
 *
 * @package namespace App\Transformers;
 */
class MonitorTransformer extends TransformerAbstract
{
    /**
     * Transform the Monitor entity.
     *
     * @param \App\Entities\Monitor $model
     *
     * @return array
     */
    public function transform(Monitor $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
