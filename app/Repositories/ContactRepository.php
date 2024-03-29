<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ContactRepository.
 *
 * @package namespace App\Repositories;
 */
interface ContactRepository extends RepositoryInterface
{
    public function getListContact();

    public function storedContact($data);
}
