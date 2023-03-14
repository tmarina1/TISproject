<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmDevelopOrder extends Model
{
        /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['reference_film'] - string - contains the order reference film 
     * $this->attributes['photo'] - string - contains the order photos
     * $this->attributes['price'] - float - contains the film develop order price
     * $this->attributes['state'] - boolean - contains the order state
     * $this->attributes['observation'] - string - contains the order observations
    */
    protected $fillable = ['reference_film','photo','price','state','observation'];
    public function getId(): int
    {
        return $this->attributes['id'];
    }
    public function setId($id) : void
    {
        $this->attributes['id'] = $id;
    }
    public function getReferenceFilm(): string
    {
        return $this->attributes['reference_film'];
    }
    public function setReferenceFilm($reference_film) : void
    {
        $this->attributes['reference_film'] = $reference_film;
    }
    public function getPhoto(): string
    {
        return $this->attributes['photo'];
    }
    public function setPhoto($photo) : void
    {
        $this->attributes['photo'] = $photo;
    }
    public function getPrice(): float
    {
        return $this->attributes['price'];
    }
    public function setPrice($price) : void
    {
        $this->attributes['price'] = $price;
    }
    public function getState(): bool
    {
        return $this->attributes['state'];
    }
    public function setState($state) : void
    {
        $this->attributes['state'] = $state;
    }
    public function getObservation(): string
    {
        return $this->attributes['observation'];
    }
    public function setObservation($observation) : void
    {
        $this->attributes['observation'] = $observation;
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function getCreated_at(): timestamp
    {
        return $this->attributes['date'];
    }
    public static function validate($request) 
    { 
        $request->validate([
            "reference_film" => "required",
            "price" => "required|numeric",
        ]); 
    }
}