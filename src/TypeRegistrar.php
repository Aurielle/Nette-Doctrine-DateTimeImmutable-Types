<?php
/**
 * This file is part of Nette-Doctrine-DateTimeImmutable-Types.
 * Copyright (c) 2015 Grifart spol. s r.o. (https://grifart.cz)
 */

namespace Grifart\NetteDoctrineDateTimeImmutableTypes;

use Nette;
use Doctrine\DBAL\Types\Type;
use VasekPurchart\Doctrine\Type\DateTimeImmutable;

/**
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class TypeRegistrar extends Nette\Object
{
	public function __construct()
	{
		throw new Nette\StaticClassException;
	}

	/**
	 * Adds _immutable counterparts for DateTime Doctrine types
	 */
	public static function addImmutableTypes()
	{
		// @codingStandardsIgnoreStart
		Type::addType(DateTimeImmutable\DateImmutableType::NAME, DateTimeImmutable\DateImmutableType::class);
		Type::addType(DateTimeImmutable\DateTimeImmutableType::NAME, DateTimeImmutable\DateTimeImmutableType::class);
		Type::addType(DateTimeImmutable\DateTimeTzImmutableType::NAME, DateTimeImmutable\DateTimeTzImmutableType::class);
		Type::addType(DateTimeImmutable\TimeImmutableType::NAME, DateTimeImmutable\TimeImmutableType::class);
		// @codingStandardsIgnoreEnd
	}

	/**
	 * Replaces default DateTime Doctrine types with their _immutable counterparts
	 */
	public static function replaceImmutableTypes()
	{
		Type::overrideType(Type::DATE, DateTimeImmutable\DateImmutableType::class);
		Type::overrideType(Type::DATETIME, DateTimeImmutable\DateTimeImmutableType::class);
		Type::overrideType(Type::DATETIMETZ, DateTimeImmutable\DateTimeTzImmutableType::class);
		Type::overrideType(Type::TIME, DateTimeImmutable\TimeImmutableType::class);
	}
}
