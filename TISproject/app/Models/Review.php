<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['review'] - text - contains the review text
     * $this->attributes['rate'] - unsigned int - contains the review rate
     * $this->attributes['userId'] - int - contains the referenced user id
     * $this->user - User - contains the associated User
     * $this->attributes['productId'] - int - contains the referenced user id
     * $this->product - Product - contains the associated Product
     * $this->attributes['created_at'] - timestamp - contains the review creation date 
     * $this->attributes['updated_at'] - timestamp - contains the review update date
    */

    protected $fillable = [
        'review',
        'rate',
        'userId',
        'productId',
    ];

    public function getReview(): string
    {
        return $this->attributes['review'];
    }

    public function setReview($review): void
    {
        $this->attributes['review'] = $review;
    }

    public function getRate(): int
    {
        return $this->attributes['rate'];
    }

    public function setRate($rate): void
    {
        $this->attributes['rate'] = $rate;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function getUser(): User
    {
        return $this->user; 
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    
    public function getProduct(): Product
    {
        return $this->product; 
    }

    public function getCreatedAt(): TimeStamp
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): TimeStamp
    {
        return $this->attributes['updated_at'];
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            "review" => "required|string",
            "rate" => "required|integer|min:1|max:5",
            "userId" => "required|exists:users,id",
            "productId" => "required|exists:products,id",
        ]);
    }


}
