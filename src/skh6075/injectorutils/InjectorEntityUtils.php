<?php

namespace skh6075\injectorutils;


use pocketmine\entity\Entity;
use pocketmine\entity\Skin;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteArrayTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\StringTag;

function createEntity(string $class, Level $level, CompoundTag $nbt): Entity{
    return Entity::createEntity($class, $level, $nbt);
}

function createEntityBaseNBT(Vector3 $vector, ?Vector3 $motion = null, float $yaw = 0.0, float $pitch = 0.0): CompoundTag{
    return Entity::createBaseNBT($vector, $motion, $yaw, $pitch);
}

function pushEntitySkinCompoundTag(CompoundTag &$nbt, Skin $skin): void{
    $nbt->setTag(new CompoundTag("Skin", [
        new StringTag('Name', $skin->getSkinId()),
        new ByteArrayTag('Data', $skin->getSkinData()),
        new ByteArrayTag('CapeData', $skin->getCapeData()),
        new StringTag('GeometryName', $skin->getGeometryName()),
        new ByteArrayTag('GeometryData', $skin->getGeometryData())
    ]));
}

class InjectorEntityUtils{

    public static function createEntity(string $class, Level $level, CompoundTag $nbt): Entity{
        return createEntity($class, $level, $nbt);
    }

    public static function createEntityBaseNBT(Vector3 $vector, ?Vector3 $motion = null, float $yaw = 0.0, float $pitch = 0.0): CompoundTag{
        return createEntityBaseNBT($vector, $motion, $yaw, $pitch);
    }

    public static function pushEntitySkinCompoundTag(CompoundTag &$nbt, Skin $skin): void{
        pushEntitySkinCompoundTag($nbt, $skin);
    }
}