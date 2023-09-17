<div class="card-container inactive">
  <div class="card">
    <div class="side front">
      <div class="img" style="background-image: url('{{$recipe['image']}}')"></div>
      <div class="info">
        <h3>{{$recipe['name']}}</h3>
        <p>{{$recipe['category']}}</p>
        <p>{{$recipe['type']}}</p>
        <p>{{$recipe['glass']}}</p>
      </div>
    </div>
    <div class="side back">
      <div class="info">
        <h3>{{$recipe['name']}}</h3>
        <ul>
          @foreach ($recipe['ingredients'] as $ingredient)
            <li>{{$ingredient['measurement']}} - {{$ingredient['ingredient']}}</li>
          @endforeach
        </ul>
        <br/>
        <h4>Instructions:</h4>
        <p>{{$recipe['instructions']}}</p>
        <div class="button draw-border">
          <x-fas-heart-circle-plus class="icon" /> Add To Favourites
        </div>
      </div>
    </div>
  </div>
</div>