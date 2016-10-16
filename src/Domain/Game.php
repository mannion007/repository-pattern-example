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

    /**
     * Game constructor.
     * @param string $gameId
     * @param string $title
     * @param string $platform
     */
    public function __construct(string $gameId, string $title, string $platform)
    {
        $this->gameId = $gameId;
        $this->title = $title;
        $this->platform = $platform;
    }

    /**
     * Game Factory...
     *
     * @param int $gameId
     * @param string $title
     * @param string $platform
     * @return Game
     */
    public static function createFrom(int $gameId, string $title, string $platform) : Game
    {
        return new static($gameId, $title, $platform);
    }

    /**
     * @return mixed
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPlatform()
    {
        return $this->platform;
    }
}
