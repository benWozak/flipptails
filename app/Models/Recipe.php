<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    // use HasFactory;
    protected $fillable = [
      'id',
      'name',
      'alternative',
      'tags',
      'video',
      'category',
      'iba',
      'type',
      'glass',
      'instructions',
      'image',
      'ingredients',
    ];

    // Getter and Setter methods for properties
    public function getId($value) {
      return $value;
    }

    public function setId($value) {
        $this->attributes['id'] = $value;
    }

    public function getName($value) {
        return $value;
    }

    public function setName($value) {
        $this->attributes['name'] = $value;
    }

    public function getAlternative($value) {
        return $value;
    }

    public function setAlternative($value) {
        $this->attributes['alternative'] = $value;
    }

    public function getTags($value) {
        return $value;
    }

    public function setTags($value) {
        $this->attributes['tags'] = $value;
    }

    public function getVideo($value) {
        return $value;
    }

    public function setVideo($value) {
        $this->attributes['video'] = $value;
    }

    public function getCategory($value) {
        return $value;
    }

    public function setCategory($value) {
        $this->attributes['category'] = $value;
    }

    public function getIba($value) {
        return $value;
    }

    public function setIba($value) {
        $this->attributes['iba'] = $value;
    }

    public function getType($value) {
        return $value;
    }

    public function setType($value) {
        $this->attributes['type'] = $value;
    }

    public function getGlass($value) {
        return $value;
    }

    public function setGlass($value) {
        $this->attributes['glass'] = $value;
    }

    public function getInstructions($value) {
        return $value;
    }

    public function setInstructions($value) {
        $this->attributes['instructions'] = $value;
    }

    public function getImage($value) {
        return $value;
    }

    public function setImage($value) {
        $this->attributes['image'] = $value;
    }

    public function getIngredients($value) {
        return $value;
    }

    public function setIngredients($value) {
        $this->attributes['ingredients'] = $value;
    }
}
