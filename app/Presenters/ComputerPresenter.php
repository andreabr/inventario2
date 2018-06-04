<?php

namespace App\Presenters;

use App\Transformers\ComputerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ComputerPresenter.
 *
 * @package namespace App\Presenters;
 */
class ComputerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ComputerTransformer();
    }
}
