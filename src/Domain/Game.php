<?php
/**
 * @author James Mannion <mannion007@gmail.com>
 * @link https://www.jamse.net
 */

namespace Mannion007\RepositoryPattern\Domain;

class Game
{
    private $gameId;
    private $title;
    private $platform;

    public function __construct(string $gameId, string $title, string $platform)
    {
        $this->gameId = $gameId;
        $this->title = $title;
        $this->platform = $platform;
    }

    public static function create(int $gameId, string $title, string $platform) : Game
    {
        return new static($gameId, $title, $platform);
    }

    public function getGameId()
    {
        return $this->gameId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPlatform()
    {
        return $this->platform;
    }
}
