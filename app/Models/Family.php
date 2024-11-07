<?php

namespace App\Models;

use DOMElement;
use DOMNode;
use App\ConverterInterface;

class Family implements ConverterInterface
{
  public function __construct(private string $name, private string $born) {}

  /**
   * type is used as the name of the XML element
   *
   * @return string
   */
  public function getType(): string
  {
    return 'family';
  }

  /**
   * Serialize the class properties as array
   * @return array
   */
  public function toArray(): array
  {
    return [
      'name' => $this->name,
      'born' => $this->born
    ];
  }
}
