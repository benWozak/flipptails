<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use ZipArchive;

class ExcelController extends Controller
{
  public function index()
  {
      $reader = new Xlsx();
      $spreadsheet = $reader->load('recipes.xlsx');  
      $worksheet = $spreadsheet->getActiveSheet();

      $jsonData = [];

      foreach ($worksheet->getRowIterator() as $row) {
        $rowData = [];
        foreach ($row->getCellIterator() as $cell) {
            $rowData[] = $cell->getValue();
        }
        $jsonData[] = $rowData;
      }

      // Convert the PHP array to JSON
      $json = json_encode($jsonData, JSON_PRETTY_PRINT);
      $excelRecipes = json_decode($json);


      return view('excel', ['excelRecipes' => $excelRecipes]);
  }

  public function create() {
    // Logic to create entry in Excel
  }
  public function update() {
    // Logic update entry in Excel
  }
  public function delete() {
    // Logic to delete recipe from Excel
  }
}
