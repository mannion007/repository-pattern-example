<?php
/**
 * @author James Mannion <mannion007@gmail.com>
 * @link https://www.jamse.net
 */

namespace Mannion007\RepositoryPattern\Repository;

interface RepositoryInterface
{
    /**
     * Retrieve a single item from the repository by ID
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id);

    /**
     * Retrieve all items from the repository
     *
     * @return mixed
     */
    public function findAll();
}
