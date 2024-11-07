<?php

namespace App;

use App\Models\Address;
use App\Models\Family;
use App\Models\Person;
use App\Models\Phone;

class Factory
{
  public static function build(string $line): ConverterInterface
  {
    $chunk = explode('|', $line);

    if ($chunk[0] == 'P') {
      return new Person(firstName: $chunk[1], lastName: $chunk[2]);
    }

    if ($chunk[0] == 'T') {
      return new Phone(mobile: $chunk[1], landLine: $chunk[2]);
    }

    if ($chunk[0] == 'A') {
      return new Address(street: $chunk[1], city: $chunk[2], postCode: $chunk[3] ?? null);
    }

    if ($chunk[0] == 'F') {
      return new Family(name: $chunk[1], born: $chunk[2]);
    }
  }
}
