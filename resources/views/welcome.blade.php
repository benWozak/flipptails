@extends('layouts.app')
@section('content')
<br />
<br />
<x-landing.hero />
<div class="wrapper">
  <br />
  <br />
  <h1 class="drink-title">Drink of the day</h1>
  <div class="flex-container">
    <div id="cocktail-data">
  </div>
</div>


<script>
  // JavaScript code to fetch and display data from the API
  fetch('https://www.thecocktaildb.com/api/json/v1/1/random.php')
      .then(response => response.json())
      .then(data => {
          const cocktailData = data.drinks[0];
          const ingredients = [];

        // Loop through the attributes and find those containing "strIngredient" and "strMeasure"
        for (let i = 1; i <= 15; i++) {
            const ingredientKey = `strIngredient${i}`;
            const measureKey = `strMeasure${i}`;

            // Check if both keys exist in the response
            if (cocktailData[ingredientKey] && cocktailData[measureKey]) {
                const ingredientObj = {
                    ingredient: cocktailData[ingredientKey],
                    measurement: cocktailData[measureKey]
                };
                ingredients.push(ingredientObj);
            }
        }

        // Reformat recipe object
        const recipe = {
          id: cocktailData.idDrink,
          name: cocktailData.strDrink,
          alternative: cocktailData.strDrinkAlternate,
          tags: cocktailData.strTags,
          video: cocktailData.strVideo,
          category: cocktailData.strCategory,
          iba: cocktailData.strIBA,
          type: cocktailData.strAlcoholic,
          glass: cocktailData.strGlass,
          instructions: cocktailData.strInstructions,
          image: cocktailData.strDrinkThumb,
          ingredients: ingredients,
        };

        const ingredientsHTML = ingredients.map(item => `
            <li>${item.measurement} ${item.ingredient}</li>
        `).join('');

        $recipe = recipe;

          // Create an HTML structure to display the cocktail information
          const cocktailInfo = `
          <div class="drink-of-the-day-container">
            <div class="drink-of-the-day-card">
              <div class="side front">
                <div class="img" style="background-image: url('${recipe.image}')"></div>
                <div class="drink-of-the-day-info">
                  <h3>${recipe.name}</h3>
                  <p>${recipe.category} / ${recipe.type}</p>
                  <p>Serve in ${recipe.glass}</p>
                  <br />
                  <h4>Ingredients:</h4>
                  <ul>${ingredientsHTML}</ul>
                  <br/>
                  <h4>Instructions:</h4>
                  <p>${recipe.instructions}</p>
                  <br />
                </div>
                </div>
              </div>
            </div>
          </div>
          `;
        
          document.getElementById('cocktail-data').innerHTML = cocktailInfo;
      })
      .catch(error => {
          console.error('Error:', error);
      });
</script>