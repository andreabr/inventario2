<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MonitorRepository;
use App\Entities\Monitor;
use App\Validators\MonitorValidator;

/**
 * Class MonitorRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MonitorRepositoryEloquent extends BaseRepository implements MonitorRepository
{
    public function totalPerStatus()
    {
        $status = new \stdClass();

        $status->usable = $this->model::usable()->count();
        $status->unusable = $this->model::unusable()->count();
        $status->stock = $this->model::stock()->count();
        $status->undermaintenance = $this->model::undermaintenance()->count();
        $status->disposing = $this->model::disposing()->count();

        return $status;
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Monitor::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return MonitorValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
