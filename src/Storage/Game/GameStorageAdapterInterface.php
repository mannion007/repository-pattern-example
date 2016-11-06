<?php

/**
 * @author James Mannion <mannion007@gmail.com>
 * @link https://www.jamse.net
 */

namespace Mannion007\RepositoryPattern\Storage\Game;

use Mannion007\RepositoryPattern\Domain\Game;

interface GameStorageAdapterInterface
{
    public function find(int $gameId);
    public function findAll() : array;
    public function findGamesOnPlatform(string $platform);
    public function persist(Game $game) : Game;
}
