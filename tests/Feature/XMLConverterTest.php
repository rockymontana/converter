<?php

test('CSV can convert to XML', function () {
  $inputFile = \base_path('input.csv');
  $xml = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<people>
  <person>
    <firstname>Victoria</firstname>
    <lastname>Bernadotte</lastname>
    <phone>
      <mobile>070-0101010</mobile>
      <land-line>0459-123456</land-line>
    </phone>
    <address>
      <street>Haga Slott</street>
      <city>Stockholm</city>
      <post-code>101</post-code>
    </address>
    <family>
      <name>Estelle</name>
      <born>2012</born>
      <address>
        <street>Solliden</street>
        <city>Öland</city>
        <post-code>10002</post-code>
      </address>
    </family>
    <family>
      <name>Oscar</name>
      <born>2016</born>
      <phone>
        <mobile>0702-020202</mobile>
        <land-line>02-202020</land-line>
      </phone>
    </family>
  </person>
  <person>
    <firstname>Joe</firstname>
    <lastname>Biden</lastname>
    <address>
      <street>White House</street>
      <city>Washington, D.C</city>
      <post-code></post-code>
    </address>
  </person>
</people>
EOD;
  $this->artisan("convert {$inputFile}")
    ->expectsOutputToContain($xml)
    ->assertSuccessful();
});

test('throws exception on faulty input', function () {
  $errorInput = __DIR__ . '/errorInput.csv';
  $this->artisan("convert {$errorInput}");
})->throws(\Exception::class, 'The prefix did not match any known keys');

test('throws exception on non-existing file input', function () {
  $missingFile = __DIR__ . '/some-non-existing-file.csv';
  $this->artisan("convert {$missingFile}");
})->throws(\Exception::class, 'Failed to open stream: No such file or directory');
