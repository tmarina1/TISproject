<?php

#Simon Cardenas

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['review'] - text - contains the review text
     * $this->attributes['rate'] - unsigned int - contains the review rate
     * $this->attributes['user_id'] - int - contains the referenced user id
     * $this->user - User - contains the associated User
     * $this->attributes['product_id'] - int - contains the referenced user id
     * $this->product - Product - contains the associated Product
     * $this->attributes['created_at'] - timestamp - contains the review creation date
     * $this->attributes['updated_at'] - timestamp - contains the review update date
     */
    protected $fillable = [
        'review',
        'rate',
        'user_id',
        'product_id',
    ];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getReview(): string
    {
        return $this->attributes['review'];
    }

    public function setReview(string $review): void
    {
        $this->attributes['review'] = $review;
    }

    public function getRate(): int
    {
        return $this->attributes['rate'];
    }

    public function setRate(string $rate): void
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

    public function setUser(int $uId): void
    {
        $this->attributes['user_id'] = $uId;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(int $pId): void
    {
        $this->attributes['product_id'] = $pId;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'review' => 'required|string',
            'rate' => 'required|integer|min:1|max:5',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);
    }

    public static function validateReviewUser(Request $request): void
    {
        $request->validate([
            'review' => 'required|string',
            'rate' => 'required|integer|min:1|max:5',
        ]);
    }
}
