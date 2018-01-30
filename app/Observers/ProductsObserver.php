<?php

namespace App\Observers;
use App\Model\Products;

class ProductsObserver extends AbstractObserver {
    public function saved($model)
    {
        //$this->clearCacheSections($model->getTable());
        // TODO: Implement saved() method.
        //htmlspecialchars_decode($model->description);
    }
    public function deleted($model) {
        // TODO: Implement deleted() method.
    }
    public function saving($model)
    {
        // TODO: Implement saving() method.
    }
    public function deleting($model)
    {
        // TODO: Implement deleting() method.
    }
}

