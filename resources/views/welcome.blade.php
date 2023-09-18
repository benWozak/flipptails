@extends('layouts.app')
@section('content')
<br />
<br />
<x-landing.hero />
<div class="wrapper">
  <h1>Drink of the day</h1>
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
        for (let i = 1; i <= 15; i++) { // Assuming there are 15 ingredients in the API response
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
          <div class="card-container inactive">
            <div class="card">
              <div class="side front">
                <div class="img" style="background-image: url('${recipe.image}')"></div>
                <div class="info">
                  <h3>${recipe.name}</h3>
                  <p>${recipe.category}</p>
                  <p>${recipe.type}</p>
                  <p>${recipe.glass}</p>
                </div>
              </div>
              <div class="side back">
                <div class="info">
                  <h3>${recipe.name}</h3>
                  <ul>${ingredientsHTML}</ul>
                  <br/>
                  <h4>Instructions:</h4>
                  <p>${recipe.instructions}</p>
                  <div class="button draw-border">
                    <x-fas-heart-circle-plus class="icon" /> Add To Favourites
                  </div>
                </div>
              </div>
            </div>
          </div>
          `;
          // const cocktailInfo = `
          //     <h3>${cocktailData.strDrink}</h3>
          //     <img src="${cocktailData.strDrinkThumb}" alt="${cocktailData.strDrink}" />
          //     <p>${cocktailData.strAlcoholic}</p>
          //     <p>Serve in a ${cocktailData.strGlass}</p>
          //     <br />
          //     <h4>Ingredients:</h4>
          //     <ul>${ingredientsHTML}</ul>
          //     <br />
          //     <h4>Instructions:</h4>
          //     <p>${cocktailData.strInstructions}</p>
          // `;

          // Insert the cocktail information into the 'cocktail-data' div
          document.getElementById('cocktail-data').innerHTML = cocktailInfo;
      })
      .catch(error => {
          console.error('Error:', error);
      });
</script>