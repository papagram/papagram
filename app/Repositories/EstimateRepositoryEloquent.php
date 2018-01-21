<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EstimateRepository;
use App\Entities\Estimate;
use App\Validators\EstimateValidator;

/**
 * Class EstimateRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EstimateRepositoryEloquent extends BaseRepository implements EstimateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Estimate::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
