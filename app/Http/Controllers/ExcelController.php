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
      // $columnHeaders = $worksheet->getRowIterator()->current();

      foreach ($worksheet->getRowIterator() as $row) {
        $rowData = [];
        foreach ($row->getCellIterator() as $cell) {
            // $value = null;
            // if(gettype($cell->getValue()) === 'string') {
            //   if(str_contains($cell->getValue() ,'https://www.thecocktaildb.com')) {
            //     // $value = "<img src='{{$cell->getValue()}}'>";
            //     // $rowData[] = $value;
            //   } 
            //   elseif(str_contains($cell->getValue() ,'https://www.youtube')) {
            //     // $value = "<a href='{{$cell->getValue()}}'>";
            //     // $rowData[] = $value;
            //   } 
            //   elseif(str_contains($cell->getValue() ,'[{')) {
            //     $temp = json_decode($cell->getValue());
            //     // $value = "<span> {{}} {{}} </span>";
            //     $rowData[] = $cell->getValue();
            //   }
            //   else {
            //     $rowData[] = $cell->getValue();
            //   }
            // } elseif(gettype($cell->getValue()) === 'NULL') {
            //   $value = "<i>No Data</i>";
            //   $rowData[] = $value;
            // } else {
            //   $rowData[] = $cell->getValue();
            // }

            $rowData[] = $cell->getValue();
            // $columnIndex = $cell->getColumn();
            // $rowData[$columnHeaders[$columnIndex]->getValue()] = $cell->getValue();
        }
        $jsonData[] = $rowData;
      }

      // dd($jsonData);
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
