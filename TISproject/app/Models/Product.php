<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['reference','image', 'brand', 'price', 'stock', 'description', 'weight'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id) : void
    {
        $this->attributes['id'] = $id;
    }

    public function getReference(): string
    {
        return $this->attributes['reference'];
    }

    public function setReference($reference) : void
    {
        $this->attributes['reference'] = $reference;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage($image) : void
    {
        $this->attributes['image'] = $image;
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand($brand) : void
    {
        $this->attributes['brand'] = $brand;
    }

    public function getPrice(): doubleval
    {
        return $this->attributes['price'];
    }

    public function setPrice($price) : void
    {
        $this->attributes['price'] = $price;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock($stock) : void
    {
        $this->attributes['stock'] = $stock;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription($description) : void
    {
        $this->attributes['description'] = $description;
    }

    public function getWeight(): float
    {
        return $this->attributes['weight'];
    }

    public function setWeight($weight) : float
    {
        $this->attributes['weight'] = $weight;
    }

    public function review() : HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReview(): Collection
    {
        return $this->review;
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            "reference" => "required|string",
            "image" => "required|image|mimes:jpg,png,jpeg", 
            "brand" => "required|string",
            "price" => "required|numeric|gt:0",
            "stock" => "required|numeric|gt:0",
            "description" => "required|string",
            "weight" => "required|gt:0",
        ]);
    }
}
