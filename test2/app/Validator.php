<?php

namespace App;

use PhpOffice\PhpSpreadsheet;

class Validator
{
    /**
     * @var TypesManager
     */
    private $typesManager;

    public function __construct()
    {
        $this->typesManager = new TypesManager;
    }

    /**
     * @param $filePath
     * @param $type
     * @return mixed
     * @throws PhpSpreadsheet\Exception
     * @throws PhpSpreadsheet\Reader\Exception
     */
    public function make($filePath, $type)
    {
        $spreadsheet = PhpSpreadsheet\IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray();
        $typeObject = $this->typesManager->resolve($type);
        if (!$typeObject->validateFields($data)) {
            throw new \Exception("Invalid fields: given fields do not match $type fields.");
        }
        return $typeObject->validateData($data);
    }

}   