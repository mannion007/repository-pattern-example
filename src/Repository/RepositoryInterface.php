<?php
/**
 * @author James Mannion <mannion007@gmail.com>
 * @link https://www.jamse.net
 */

namespace Mannion007\RepositoryPattern\Repository;

interface RepositoryInterface
{
    public function find(int $id);
    public function findAll();
}
