<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ComputerRepository;
use App\Entities\Computer;
use App\Validators\ComputerValidator;

/**
 * Class ComputerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ComputerRepositoryEloquent extends BaseRepository implements ComputerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Computer::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ComputerValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
