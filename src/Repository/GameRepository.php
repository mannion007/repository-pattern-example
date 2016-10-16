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

    /**
     * Retrieve a single item from the repository by ID
     *
     * @param int $gameId
     * @return Game | null
     */
    public function find(int $gameId)
    {
        $gameFromStorage = $this->storageAdapter->find($gameId);

        if (false === empty($gameFromStorage)) {
            return Game::createFrom(
                (int)$gameFromStorage['game_id'],
                $gameFromStorage['title'],
                $gameFromStorage['platform']
            );
        }

        return null;
    }

    /**
     * Retrieve all items from the repository
     *
     * @return array
     */
    public function findAll() : array
    {
        return $this->buildCollection($this->storageAdapter->findAll());
    }

    /**
     * @return Game[]
     */
    public function findMegadrive() : array
    {
        return $this->buildCollection($this->storageAdapter->findGamesOnPlatform('megadrive'));
    }

    /**
     * @param array $items
     * @return array
     */
    private function buildCollection(array $items) : array
    {
        $collection = [];
        if (0 < count($items)) {
            foreach ($items as $item) {
                $collection[] = Game::createFrom(
                    $item['game_id'],
                    $item['title'],
                    $item['platform']
                );
            }
        }
        return $collection;
    }
}
