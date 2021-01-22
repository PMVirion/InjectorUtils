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
