<?php

namespace Salesman;

use League\Csv\Reader;

class InFileCitiesRepository implements CitiesRepository
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function cities(): Cities
    {
        $reader = Reader::createFromPath($this->filePath, 'r');
        $reader->setDelimiter("\t");

        $cities = [];

        foreach ($reader as $index => $row)
        {
            $cities[] = new City($row[0], (float) $row[1], (float) $row[2]);
        }

        return new Cities($cities);
    }
}
