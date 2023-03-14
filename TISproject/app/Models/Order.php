<?php

namespace App\Models;

use App\Models\User;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
        /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['numberOrder'] - string - contains the order reference film 
     * $this->attributes['totalPrice'] - int - contains the film develop order price
     * $this->attributes['state'] - boolean - contains the order state
     * $this->attributes['user_id'] - int - contains the referenced user id
     * $this->attributes['created_at'] - timestamp - contains the review creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     * $this->users - User[] - contains the associated users
     * $this->items - Item[] - contains the associated items
    */
    protected $fillable = ['state'];
    public function getId(): int
    {
        return $this->attributes['id'];
    }
    public function setId($id) : void
    {
        $this->attributes['id'] = $id;
    }
    public function getNumberOrder(): int
    {
        return $this->attributes['numberOrder'];
    }
    public function setNumberOrder($numberOrder) : void
    {
        $this->attributes['numberOrder'] = $numberOrder;
    }
    public function getTotalPrice(): int
    {
        return $this->attributes['totalPrice'];
    }
    public function setTotalPrice($totalPrice) : void
    {
        $this->attributes['totalPrice'] = $totalPrice;
    }
    public function getState(): bool
    {
        return $this->attributes['state'];
    }
    public function setState($state) : void
    {
        $this->attributes['state'] = $state;
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function getUser(): User
    {
        return $this->user; 
    }
    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
    public function getItems(): Collection
    {
        return $this->item; 
    }
    public function getCreated_at(): timestamp
    {
        return $this->attributes['date'];
    }
    public function getUpdatedAt(): timestamp
    {
        return $this->attributes['updated_at'];
    }
    public static function validate($request) 
    { 
        $request->validate([
            "user_id" => "required|exists:users,id", 
            "state" => "required",
            "totalPrice" => "required",
        ]); 
    }
    //--------------------------------------------------------------------
}