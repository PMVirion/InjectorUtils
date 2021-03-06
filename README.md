# InjectorUtils
[PMMP] A Plugin implement Utils.

# How Use?

## Injector Position Utils.

- A Position receives information in the form of a string.
```php
\skh6075\injectorutils\InjectorPositionUtils::posToHash(Position $position, int $type);
```

- A Hash string is created as a Position class.
```php
\skh6075\injectorutils\InjectorPositionUtils::hashToPos(string $position, int $type);
```

- The types of types are as follows.
```php
InjectorPositionUtils::TYPE_INTERVAL

InjectorPositionUtils::TYPE_FLOATVAL;
```


## Injector Item Utils.

- Accept the name of the item.
```php
\skh6075\injectorutils\InjectorItemUtils::getItemName(Item $item);
```

- A Item receives information in the form of a string.
```php
\skh6075\injectorutils\InjectorItemUtils::itemToHash(Item $item, bool $pushDamage, bool $pushCompoundTag);
```

- A Hash string is created as a Item class.
```php
\skh6075\injectorutils\InjectorItemUtils::hashToItem(string $hash);
```

## Injector Skin Utils.

- Receive the method of the Skin class as array.
```php
\skh6075\injectorutils\InjectorSkinUtils::skinToMap(Skin $skin);
```

- Converts SkinMap to a Skin class.
```php
\skh6075\injectorutils\InjectorSkinUtils::mapToSkin(array $skinMap);
```

- Converts Geometry data into a modeling Skin class.
```php
\skh6075\injectorutils\InjectorSkinUtils::makeGeometrySkin(Skin $skin, string $path, string $geometryName);
```
