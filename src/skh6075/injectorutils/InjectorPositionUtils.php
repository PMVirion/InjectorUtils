<?php

namespace skh6075\injectorutils;

use pocketmine\level\Position;
use pocketmine\Server;
use function intval;
use function floatval;

function posToHash(Position $position, int $type): string{
    if ($type === InjectorPositionUtils::TYPE_INTERVAL)
        return intval($position->x) . ":" . intval($position->y) . ":" . intval($position->z) . ":" . $position->level->getFolderName();
    else if ($type === InjectorPositionUtils::TYPE_FLOATVAL)
        return floatval($position->x) . ":" . intval($position->y) . ":" . floatval($position->z) . ":" . $position->level->getFolderName();
    else return posToHash($position, InjectorPositionUtils::TYPE_FLOATVAL);
}

function hashToPos(string $hash, int $type): Position{
    [$x, $y, $z, $level] = explode(":", $type);
    $level = Server::getInstance()->getLevelByName($level);

    if ($type === InjectorPositionUtils::TYPE_INTERVAL)
        return new Position(intval($x), intval($y), intval($z), $level);
    else if ($type === InjectorPositionUtils::TYPE_FLOATVAL)
        return new Position(floatval($x), floatval($y), floatval($z), $level);
    else return hashToPos($hash, InjectorPositionUtils::TYPE_FLOATVAL);
}

class InjectorPositionUtils{

    public const TYPE_INTERVAL = 0;
    public const TYPE_FLOATVAL = 1;


    public static function posToHash(Position $position, int $type): string{
        return posToHash($position, $type);
    }

    public static function hashToPos(string $hash, int $type): Position{
        return hashToPos($hash, $type);
    }
}