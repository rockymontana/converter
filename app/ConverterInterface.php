<?php

namespace App;

interface ConverterInterface
{
  public function getType(): string;
  public function toArray(): array;
}
