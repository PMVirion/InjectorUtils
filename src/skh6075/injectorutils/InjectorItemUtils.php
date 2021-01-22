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

function itemToHash(Item $item, bool $pushDamage = false, bool $pushCompoundTag = false): string{
    $hash = $item->getId() . ":" . $item->getDamage() . ":";
    if ($pushDamage)      $hash .= $item->getDamage() . ":";
    if ($pushCompoundTag) $hash .= base64_encode($item->getCompoundTag());
    return $hash;
}

function hashToItem(string $hash): Item{
    $split = explode(":", $hash);
    [$id, $meta, $count, $nbt] = [0, 0, 0, null];

    if (isset($split[0])) $id = $split[0];
    if (isset($split[1])) $meta = $split[1];
    if (isset($split[2])) $count = $split[2];
    if (isset($split[3])) $nbt = base64_decode($split[3]);
    return ItemFactory::get($id, $meta, $count, $nbt);
}

class InjectorItemUtils{

    public static function getItemName(Item $item): string{
        return getItemName($item);
    }

    public static function itemToHash(Item $item, bool $pushDamage = true, bool $pushCompoundTag = false): string{
        return itemToHash($item, $pushDamage, $pushCompoundTag);
    }

    public static function hashToItem(string $hash): Item{
        return hashToItem($hash);
    }
}