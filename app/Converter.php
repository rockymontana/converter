<?php

namespace App;

use App\Factory;

class Converter
{
  private array $content;
  private ConverterInterface $parentModel;

  public function __construct(string $path)
  {
    $fileContent = file_get_contents($path);
    $this->content = explode(PHP_EOL, $fileContent);
  }

  /**
   * Structure the incoming CSV file according to the desired output
   * to make it easy to convert it to the desired output format.
   *
   * @return void
   */
  private function structureCSV()
  {
    $result = [];
    $personCount = -1;
    $familyCount = -1;
    foreach ($this->content as $row) {
      $model = Factory::build($row);

      if ($model->getType() == 'person') {
        $personCount++;
        $result['person'][$personCount] = $model->toArray();
        $this->parentModel = $model;
      }

      if ($model->getType() == 'family') {
        $familyCount++;
        $result['person'][$personCount]['family'][$familyCount] = $model->toArray();
        $this->parentModel = $model;
      }

      if ($this->parentModel->getType() == 'person' && $model->getType() != 'person') {
        $result['person'][$personCount][$model->getType()] = $model->toArray();
      }

      if ($this->parentModel->getType() == 'family' && $model->getType() != 'family') {
        $result['person'][$personCount]['family'][$familyCount][$model->getType()] = $model->toArray();
      }
    }

    return $result;
  }

  /**
   * Convert the restructured CSV into XML.
   *
   * @return XML
   */
  public function toXML()
  {
    return array_to_xml($this->structureCSV(), 'people');
  }

  public function toJson()
  {
    return collect(['people' => $this->structureCSV()])->toJson();
  }
}
