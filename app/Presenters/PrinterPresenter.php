<?php

namespace App\Presenters;

use App\Transformers\PrinterTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PrinterPresenter.
 *
 * @package namespace App\Presenters;
 */
class PrinterPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PrinterTransformer();
    }
}
