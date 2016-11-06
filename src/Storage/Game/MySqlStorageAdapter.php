<?php
/**
 * @author James Mannion <mannion007@gmail.com>
 * @link https://www.jamse.net
 */

namespace Mannion007\RepositoryPattern\Storage\Game;

use Mannion007\RepositoryPattern\Domain\Game;

class MySqlStorageAdapter implements GameStorageAdapterInterface
{

    /** @var \PDO $connection */
    private $connection;

    public function __construct(string $username, string $password, string $host, string $dbName, int $port = 3306)
    {
        $this->connection = new \PDO($this->getDsn($host, $port, $dbName), $username, $password);
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    private function getDsn(string $host, string $port, string $dbName) : string
    {
        return sprintf('mysql:dbname=%s;host=%s;port=%s', $dbName, $host, $port);
    }

    public function find(int $gameId)
    {
        $sql = 'SELECT game_id, title, platform FROM games WHERE game_id = :id';
        $statement = $this->connection->prepare($sql);
        $statement->execute([':id' => $gameId]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function findAll() : array
    {
        $sql = 'SELECT game_id, title, platform FROM games';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function persist(Game $game) : Game
    {
        if (true === is_null($game->getGameId())) {
            $sql = 'INSERT INTO games (title, platform) VALUES (:title, :platform)';
            $statement = $this->connection->prepare($sql);
            $statement->execute([':title' => $game->getTitle(), ':platform' => $game->getPlatform()]);
            return Game::create($this->connection->lastInsertId(), $game->getTitle(), $game->getPlatform());
        }

        $sql = 'UPDATE games SET title = :title, platform = :platform WHERE game_id = :game_id';
        $statement = $this->connection->prepare($sql);
        $statement->execute(
            [
                ':title' => $game->getTitle(), ':platform' => $game->getPlatform(), 'game_id' => $game->getGameId()
            ]
        );

        return $game;
    }

    public function findGamesOnPlatform(string $platform)
    {
        $sql = 'SELECT game_id, title, platform FROM games WHERE platform = :platform';
        $statement = $this->connection->prepare($sql);
        $statement->execute([':platform' => $platform]);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
