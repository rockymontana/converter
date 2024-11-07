<?php

namespace App\Models;

use DOMElement;
use App\ConverterInterface;
use DOMNode;

class Address implements ConverterInterface
{
  public function __construct(
    private string $street,
    private string $city,
    private string|null $postCode
  ) {}

  /**
   * type is used as the name of the XML element
   *
   * @return string
   */
  public function getType(): string
  {
    return 'address';
  }

  /**
   * Serialize the class properties as array
   * @return array
   */
  public function toArray(): array
  {
    return [
      'street' => $this->street,
      'city' => $this->city,
      'post-code' => $this->postCode ?? null
    ];
  }
}
