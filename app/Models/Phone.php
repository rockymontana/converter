<?php

namespace App\Models;

use DOMElement;
use DOMNode;
use App\ConverterInterface;

class Phone implements ConverterInterface
{
  public function __construct(private string $mobile, private string $landLine) {}

  /**
   * type is used as the name of the XML element
   *
   * @return string
   */
  public function getType(): string
  {
    return 'phone';
  }

  /**
   * Serialize the class properties as array
   * @return array
   */
  public function toArray(): array
  {
    return [
      'mobile' => $this->mobile,
      'land-line' => $this->landLine
    ];
  }
}
