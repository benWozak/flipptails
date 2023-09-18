@extends('layouts.app')
@section('content')
<br/>
<br/>
<br/>
<div class="excel-container">
  <h1>Excel Recipes</h1>
  <div class="flex-container">
    <table>
      <thead>
          <tr>
              @foreach($excelRecipes[0] as $header)
                  <th>{{ $header }}</th>
              @endforeach
          </tr>
      </thead>
      <tbody>
          @foreach($excelRecipes as $row)
              <tr @if ($loop->first) class="hidden" @endif>
                  @foreach($row as $cell)
                      <td>{!! $cell !!}</td>
                  @endforeach
              </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>