<?php

namespace App\Models;

use App\ConverterInterface;

class Person implements ConverterInterface
{
  public function __construct(private string $firstName, private string $lastName) {}

  /**
   * type is used as the name of the XML element
   *
   * @return string
   */
  public function getType(): string
  {
    return 'person';
  }

  /**
   * Serialize the class properties as array
   * @return array
   */
  public function toArray(): array
  {
    return [
      'firstname' => $this->firstName,
      'lastname' => $this->lastName
    ];
  }
}
