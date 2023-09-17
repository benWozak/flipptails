<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{
  public function index()
  {
    $response = Http::withOptions([
      'verify' => false,
    ])->get('https://www.thecocktaildb.com/api/json/v1/1/search.php', ['f' => 'a']);

    $results = json_decode($response->body(), true);
    
    $recipes = $this->formatRecipes($results);
    
    return view('recipes', ['recipes' => $recipes]);
  }

  public function browse($filter) {
    $response = Http::withOptions([
      'verify' => false,
    ])->get('https://www.thecocktaildb.com/api/json/v1/1/search.php', ['f' => $filter]);

    $results = json_decode($response->body(), true);
    
    $recipes = $this->formatRecipes($results);
    
    return view('recipes', ['recipes' => $recipes]);
  }

  /**
   * As you will see in the code block below, this api response is absolutely atrocious.
   * It's not pretty, and I decided to abstract it for this reason.
   * 
   * See ReadMe doc for an example of what the API looks like.
   * 
   */
  private function formatRecipes($results) {
    if(!is_null($results)) {
      $drinks = $results["drinks"];

      $formattedRecipes = [];
      if($results["drinks"] !== null) {
        for($i = 0; $i < count($results["drinks"]); $i++) {
          $ingredients = [];
          for ($j = 1; $j <= 15; $j++) {
              $ingredient = $drinks[$i]['strIngredient' . $j];
              $measurement = $drinks[$i]['strMeasure' . $j];
    
              if ($ingredient !== null && $measurement !== null) {
                  $ingredients[] = [
                      'ingredient' => $ingredient,
                      'measurement' => $measurement
                  ];
              }
          }
          $object = new Recipe([
            'id' => $drinks[$i]['idDrink'],
            'name' => $drinks[$i]['strDrink'],
            'alternative' => $drinks[$i]['strDrinkAlternate'],
            'tags' => $drinks[$i]['strTags'],
            'video' => $drinks[$i]['strVideo'],
            'category' => $drinks[$i]['strCategory'],
            'iba' => $drinks[$i]['strIBA'],
            'type' => $drinks[$i]['strAlcoholic'],
            'glass' => $drinks[$i]['strGlass'],
            'instructions' => $drinks[$i]['strInstructions'],
            'image' => $drinks[$i]['strDrinkThumb'],
            'ingredients' => $ingredients
          ]);

          // sanitize
          $recipe = json_encode($object);
    
          array_push($formattedRecipes, json_decode($recipe, true));
        }
      }

      return $formattedRecipes;
    }
  }





  public function excel()
  {
      // $recipes = Recipe::all();
      return view('excel');
  }

  public function exportToExcel()
  {
      // Logic to export recipes to Excel
  }
}
