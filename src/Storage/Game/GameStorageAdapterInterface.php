<?php

/**
 * @author James Mannion <mannion007@gmail.com>
 * @link https://www.jamse.net
 */

namespace Mannion007\RepositoryPattern\Storage\Game;

use Mannion007\RepositoryPattern\Domain\Game;

interface GameStorageAdapterInterface
{
    /**
     * Retrieve a single game from storage by ID
     *
     * @param int $gameId
     * @return mixed
     */
    public function find(int $gameId);

    /**
     * Retrieve all games from storage
     *
     * @return array
     */
    public function findAll() : array;

    /**
     * Retrieve all games for a given platform from storage
     *
     * @param string $platform
     * @return mixed
     */
    public function findGamesOnPlatform(string $platform);

    /**
     * Persist a game to storage
     *
     * @param Game $game
     * @return Game
     */
    public function persist(Game $game) : Game;
}
