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
            
            'user' => trim(mb_strtoupper($model->user)),
            'type' => trim(strtoupper($model->type)),
            'manufacturer' => trim(strtoupper($model->manufacturer)),
            'model' => trim(strtoupper($model->model)),
            'processor' => trim(strtoupper($model->processor)),
            'memory_capacity' => trim(strtoupper($model->memory_capacity)),
            'hard_disk_capacity' => trim(strtoupper($model->hard_disk_capacity)),
            'operacional_system' => trim(strtoupper($model->operacional_system)),
            'sys_op_architecture' => trim(strtoupper($model->sys_op_architecture)),
            'serial_number' => trim(strtoupper($model->serial_number)),
            'licensed' => trim(strtoupper($model->licensed)),
            'network_name' => trim(strtoupper($model->network_name)),
            'status' => trim(strtoupper($model->status)),

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
