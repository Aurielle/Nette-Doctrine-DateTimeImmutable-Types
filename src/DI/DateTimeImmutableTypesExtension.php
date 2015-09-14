<?php
/**
 * This file is part of Nette-Doctrine-DateTimeImmutable-Types.
 * Copyright (c) 2015 Grifart spol. s r.o. (https://grifart.cz)
 */

namespace Grifart\NetteDoctrineDateTimeImmutableTypes\DI;

use Nette;
use VasekPurchart\Doctrine\Type\DateTimeImmutable;

class DateTimeImmutableTypesExtension extends Nette\DI\CompilerExtension
{
	const REGISTER_ADD = 'add';
	const REGISTER_REPLACE = 'replace';
	const REGISTER_ADD_REPLACE = 'add_and_replace';


	/** @var array */
	public $defaults = [
		'enable' => TRUE,
		'method' => self::REGISTER_ADD,
	];


	public function loadConfiguration()
	{
		$config = $this->getConfig($this->defaults);

		if (!in_array($config['method'], [self::REGISTER_ADD, self::REGISTER_REPLACE, self::REGISTER_ADD_REPLACE], TRUE)) {
			throw new Nette\InvalidArgumentException("Invalid registration method for DateTimeImmutable types: $config[method]");
		}
	}

	public function afterCompile(Nette\PhpGenerator\ClassType $class)
	{
		$config = $this->getConfig($this->defaults);
		$initialize = $class->getMethod('initialize');

		if ($config['enable'] !== TRUE) {
			return;
		}

		if (in_array($config['method'], [self::REGISTER_ADD, self::REGISTER_ADD_REPLACE], TRUE)) {
			$initialize->addBody('Grifart\NetteDoctrineDateTimeImmutableTypes\TypeRegistrar::addImmutableTypes();');
		}

		if (in_array($config['method'], [self::REGISTER_REPLACE, self::REGISTER_ADD_REPLACE], TRUE)) {
			$initialize->addBody('Grifart\NetteDoctrineDateTimeImmutableTypes\TypeRegistrar::replaceImmutableTypes();');
		}
	}
}
