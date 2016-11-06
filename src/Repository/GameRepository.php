<?php

/**
 * @author James Mannion <mannion007@gmail.com>
 * @link https://www.jamse.net
 */

namespace Mannion007\RepositoryPattern\Repository;

use Mannion007\RepositoryPattern\Domain\Game;
use Mannion007\RepositoryPattern\Storage\Game\GameStorageAdapterInterface;

class GameRepository implements RepositoryInterface
{
    /** @var GameStorageAdapterInterface $storageAdapter */
    private $storageAdapter;

    public function __construct(GameStorageAdapterInterface $storageAdapter)
    {
        $this->storageAdapter = $storageAdapter;
    }

    public function find(int $gameId)
    {
        $gameFromStorage = $this->storageAdapter->find($gameId);

        if (false === empty($gameFromStorage)) {
            return Game::create(
                (int)$gameFromStorage['game_id'],
                $gameFromStorage['title'],
                $gameFromStorage['platform']
            );
        }

        return null;
    }

    public function findAll() : array
    {
        return $this->buildCollection($this->storageAdapter->findAll());
    }

    public function findMegadrive() : array
    {
        return $this->buildCollection($this->storageAdapter->findGamesOnPlatform('megadrive'));
    }

    private function buildCollection(array $items) : array
    {
        $collection = [];
        if (0 < count($items)) {
            foreach ($items as $item) {
                $collection[] = Game::create(
                    $item['game_id'],
                    $item['title'],
                    $item['platform']
                );
            }
        }
        return $collection;
    }
}
