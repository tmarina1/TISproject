<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Review;

class Product extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['reference'] - string - contains the product reference
     * $this->attributes['image'] - string - contains the product image
     * $this->attributes['brand'] - string - contains the product brand
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['stock'] - string - contains the product stock
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['weight'] - string - contains the product weight
     * $this->reviews - Review[] - contains the associated reviews
     * $this->users - User[] - contains the associated users
     * $this->attributes['created_at'] - timestamp - contains the product creation date 
     * $this->attributes['updated_at'] - timestamp - contains the product update date
    */

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

    public function getPrice(): int
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

    public function setWeight($weight) : void
    {
        $this->attributes['weight'] = $weight;
    }

    public function reviews() : HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
    }

    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    public function getUsers(): Collection
    {
        return $this->user;
    }

    public function setUsers(Collection $users): void
    {
        $this->users = $users;
    }

    public function items(): HasMany
    { 
        return $this->hasMany(Item::class); 
    } 

    public function getItems(): Collection
    { 
        return $this->items; 
    } 

    public function setItems(Collection $items): void
    {
        $this->items = $items; 
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
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

    public static function validateUpdate(Request $request): void
    {
        $request->validate([
            "image" => "image|mimes:jpg,png,jpeg", 
            "price" => "numeric|gt:0",
            "stock" => "numeric|gt:0",
            "description" => "string",
        ]);
    }

    public static function sumPricesByQuantities($products, $productsInSession) 
    { 
        $total = 0; 
        foreach ($products as $product) 
        { 
            $total = $total + ($product->getPrice()*$productsInSession[$product->getId()]); 
        } 
        return $total; 
    }
}
