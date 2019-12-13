<?php

namespace Controller;


class Database implements DataInterface
{
    public $pathFile;
    public function __construct($pathFile)
    {
        $this->pathFile = $pathFile;
    }

    function readDataFile()
    {
        $dataJson = file_get_contents($this->pathFile);
        return json_decode($dataJson, true);
    }

    public function saveDataToFile($data)
    {
        try {
            $dataJson = json_encode($data);
            file_put_contents($this->pathFile, $dataJson);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}