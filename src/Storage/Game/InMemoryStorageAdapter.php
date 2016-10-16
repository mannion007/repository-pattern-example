<?php
/**
 * @author James Mannion <mannion007@gmail.com>
 * @link https://www.jamse.net
 */

namespace Mannion007\RepositoryPattern\Storage\Game;

use Mannion007\RepositoryPattern\Domain\Game;

class InMemoryStorageAdapter implements GameStorageAdapterInterface
{
    /** @var array $games */
    private $games = [];

    /**
     * Retrieve a single game from storage by ID
     *
     * @param int $gameId
     * @return mixed
     */
    public function find(int $gameId)
    {
        return $this->games[$gameId];
    }

    /**
     * Retrieve all games from storage
     *
     * @return array
     */
    public function findAll() : array
    {
        return $this->games;
    }

    /**
     * Retrieve all games for a given platform from storage
     *
     * @param string $platform
     * @return mixed
     */
    public function findGamesOnPlatform(string $platform)
    {
        return array_filter(
            $this->games,
            function ($game, $platform) {
                return $platform == $game->getPlatform();
            }
        );
    }

    /**
     * Persist a game to storage
     *
     * @param Game $game
     * @return Game
     */
    public function persist(Game $game) : Game
    {
        if (false === is_null($game->getGameId())) {
            $gameId = $game->getGameId();
        } else {
            $gameId = count($this->games);
        }
        $this->games[$gameId] = $game;
    }
}
