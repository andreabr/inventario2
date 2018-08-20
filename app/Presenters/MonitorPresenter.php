<?php

namespace App\Presenters;

use App\Transformers\MonitorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MonitorPresenter.
 *
 * @package namespace App\Presenters;
 */
class MonitorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MonitorTransformer();
    }
}
