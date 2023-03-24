<?php
#Tomas Marin Aristizabal

namespace App\Models;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wish extends Model
{
    /**
     * WISH ATTRIBUTES

    */

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id) : void
    {
        $this->attributes['id'] = $id;
    }

    public function getUserId() 
    { 
        return $this->attributes['user_id']; 
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getProductId() 
    { 
        return $this->attributes['product_id']; 
    } 

    public function setProductId(int $productId): void
    {
        $this->attributes['product_id'] = $productId;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct($product): void
    {
        $this->product = $product;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user; 
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function getCreatedAt(): timestamp
    {
        return $this->attributes['created_at'];
    }

    public function getUpdateAt(): timestamp
    {
        return $this->attributes['updated_at'];
    }

}
