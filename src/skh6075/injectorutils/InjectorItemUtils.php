<?php

namespace skh6075\injectorutils;


use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use function base64_encode;
use function base64_decode;
use function explode;

function getItemName(Item $item): string{
    return $item->hasCustomName() ? $item->getCustomName() : $item->getName();
}

function itemToHash(Item $item, bool $pushCount = false, bool $pushCompoundTag = false): string{
    $hash = $item->getId() . ":" . $item->getDamage() . ":";
    if ($pushCount)      $hash .= $item->getCount() . ":";
    if ($pushCompoundTag) $hash .= base64_encode($item->getCompoundTag());
    return $hash;
}

function hashToItem(string $hash, bool $pushCount = false, bool $pushCompoundTag = true): Item{
    $split = explode(":", $hash);
    $item = ItemFactory::get($split[0], $split[1]);

    $pushCount ? $item->setCount(intval($split[2] ?? 1)) : $item->setCount(1);
    if (!$pushCount and $pushCompoundTag) {
        $item->setCompoundTag(base64_decode($split[2]));
    } else if ($pushCount and $pushCompoundTag) {
        $item->setCompoundTag(base64_decode($split[3]));
    }
    return $item;
}

class InjectorItemUtils{

    public static function getItemName(Item $item): string{
        return getItemName($item);
    }

    public static function itemToHash(Item $item, bool $pushCount = true, bool $pushCompoundTag = false): string{
        return itemToHash($item, $pushCount, $pushCompoundTag);
    }

    public static function hashToItem(string $hash, bool $pushCount = false, bool $pushCompoundTag = true): Item{
        return hashToItem($hash, $pushCount, $pushCompoundTag);
    }
}