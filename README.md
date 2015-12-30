# Nette-Doctrine-DateTimeImmutable-Types
## This extension is ABANDONED.
[Kdyby/Doctrine](https://github.com/Kdyby/Doctrine) provides sufficient support for custom data types. Compatibility with other Nette-Doctrine extensions is unknown. Register the types in config.neon:
```
doctrine:
  types:
    # to replace:
    date: VasekPurchart\Doctrine\Type\DateTimeImmutable\DateImmutableType
    datetime: VasekPurchart\Doctrine\Type\DateTimeImmutable\DateTimeImmutableType
    datetimetz: VasekPurchart\Doctrine\Type\DateTimeImmutable\DateTimeTzImmutableType
    time: VasekPurchart\Doctrine\Type\DateTimeImmutable\TimeImmutableType
    
    # or to add alongside already existing datetime types:
    date_immutable: VasekPurchart\Doctrine\Type\DateTimeImmutable\DateImmutableType
    datetime_immutable: VasekPurchart\Doctrine\Type\DateTimeImmutable\DateTimeImmutableType
    datetimetz_immutable: VasekPurchart\Doctrine\Type\DateTimeImmutable\DateTimeTzImmutableType
    time_immutable: VasekPurchart\Doctrine\Type\DateTimeImmutable\TimeImmutableType
```

~~Integration of VasekPurchart/Doctrine-Date-Time-Immutable-Types into Nette via DI extension.~~

~~Highly work in progress and doesn't include tests (yet).~~
