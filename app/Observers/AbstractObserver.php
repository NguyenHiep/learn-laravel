<?php
/**
 * Created by PhpStorm.
 * User: nguyenminhhiep
 * Date: 1/30/2018
 * Time: 11:29 AM
 */

namespace App\Observers;
use \Cache;

abstract class AbstractObserver {

    protected function clearCacheTags($tags) {
        //Cache::tags($tags)->flush();
    }

    protected function clearCacheSections($section) {
        //Cache::section($section)->flush();
    }

    abstract public function saved($model);

    abstract public function saving($model);

    abstract public function deleted($model);

    abstract public function deleting($model);
}