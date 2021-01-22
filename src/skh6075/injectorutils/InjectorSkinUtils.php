<?php

namespace skh6075\injectorutils;

use pocketmine\entity\Skin;
use function base64_encode;
use function base64_decode;
use function file_exists;
use function file_get_contents;
use function imagecreatefrompng;
use function getimagesize;
use function imagedestroy;

function skinToMap(Skin $skin): array{
    return [
        base64_encode($skin->getSkinId()),
        base64_encode($skin->getSkinData()),
        base64_encode($skin->getCapeData()),
        base64_encode($skin->getGeometryName()),
        base64_encode($skin->getGeometryData())
    ];
}

function mapToSkin(array $skinMap = []): Skin{
    return new Skin(base64_decode($skinMap[0]), base64_decode($skinMap[1]), base64_decode($skinMap[2]), base64_decode($skinMap[3]), base64_decode($skinMap[4]));
}

function makeGeometrySkin(Skin $skin, string $path, string $geometryName): Skin{
    if (!file_exists($path . $geometryName . ".json") or !file_exists($path . $geometryName . ".png"))
        return $skin;

    $img = imagecreatefrompng($path . $geometryName . ".png");
    $bytes = "";
    $size = getimagesize($path . $geometryName . ".png")[1];

    for ($y = 0; $y < $size; $y ++) {
        for ($x = 0; $x < 64; $x ++) {
            $colorat = imagecolorat($img, $x, $y);
            $a = ((~((int) ($colorat >> 24))) << 1) & 0xff;
            $r = ($colorat >> 16) & 0xff;
            $g = ($colorat >> 8) & 0xff;
            $b = $colorat & 0xff;
            $bytes .= chr($r) . chr($g) . chr($b) . chr($a);
        }
    }
    imagedestroy($img);
    return new Skin($skin->getSkinId(), $bytes, "", "geometry.rmsp" . $geometryName, file_get_contents($path . $geometryName . ".json"));
}


class InjectorSkinUtils{

    public static function skinToMap(Skin $skin): array{
        return skinToMap($skin);
    }

    public static function mapToSkin(array $skinMap = []): Skin{
        return mapToSkin($skinMap);
    }

    public static function makeGeometrySkin(Skin $skin, string $path, string $geometryName): Skin{
        return makeGeometrySkin($skin, $path, $geometryName);
    }
}