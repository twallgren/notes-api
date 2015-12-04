<?php

namespace Notes\Domain\ValueObject;
use InvalidArgumentException;

class StringLiteral
{
	public $value;
	public function __construct($value = '')
	{
		if(!is_string($value))
		{
			throw new InvalidArgumentException(
				__METHOD__ . '(): $value must be a string'
			);
		}

        $this->value=$value;
	}
	public function __toString()
	{
		return $this->value;
	}
}
