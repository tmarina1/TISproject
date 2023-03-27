<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user's name
     * $this->attributes['lastName'] - string - contains the user's last name
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['email'] - string - contains the user email address
     * $this->attributes['telephone'] - string - contains the user telephone number
     * $this->attributes['address'] - string - contains the user address
     * $this->attributes['userType'] - string - contains the user type (client or admin)
     * $this->attributes['reviewId'] - int - contains the referenced review id
     * $this->reviews - Review[] - contains the associated reviews
     * $this->attributes['productInWish'] - int - contains the referenced product id
     * $this->wishList - Products[] - contains the associated products
     * $this->attributes['balance'] - int - contains the user balance
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     * $this->attributes['email_verified_at'] - timestamp - contains the user email verification date
     */
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'lastName',
        'password',
        'email',
        'telephone',
        'address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getLastName(): string
    {
        return $this->attributes['lastName'];
    }

    public function setLastName(string $lastName): void
    {
        $this->attributes['lastName'] = $lastName;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getTelephone(): string
    {
        return $this->attributes['telephone'];
    }

    public function setTelephone(string $telephone): void
    {
        $this->attributes['telephone'] = $telephone;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getUserType(): string
    {
        return $this->attributes['userType'];
    }

    public function setUserType(string $type): void
    {
        $this->attributes['userType'] = $type;
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->review;
    }

    public function setReviews($reviews): void
    {
        $this->reviews = $reviews;
    }

    public function wishList(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getWishList(): Collection
    {
        return $this->wishList;
    }

    public function setWishList($wishes): void
    {
        $this->wishList = $wishes;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getEmailVerifiedAt(): TimeStamp
    {
        return $this->attributes['email_verified_at'];
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|string',
            'telephone' => 'required|string',
            'address' => 'required|string',
        ]);
    }
}
