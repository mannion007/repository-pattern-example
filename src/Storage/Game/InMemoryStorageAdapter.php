<?php
/**
 * @author James Mannion <mannion007@gmail.com>
 * @link https://www.jamse.net
 */

namespace Mannion007\RepositoryPattern\Storage\Game;

use Mannion007\RepositoryPattern\Domain\Game;

class InMemoryStorageAdapter implements GameStorageAdapterInterface
{
    /** @var Game[] $games */
    private $games = [];

    public function find(int $gameId)
    {
        return $this->games[$gameId];
    }

    public function findAll() : array
    {
        return $this->games;
    }

    public function findGamesOnPlatform(string $platform)
    {
        return array_filter(
            $this->games,
            function ($game, $platform) {
                return $platform == $game->getPlatform();
            }
        );
    }

    public function persist(Game $game) : Game
    {
        if (true === is_null($game->getGameId())) {
            $game = Game::create(count($this->games), $game->getTitle(), $game->getPlatform());
        }
        $this->games[$game->getGameId()] = $game;
        return $game;
    }
}
