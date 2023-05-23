<?php

//Juan Pablo Yepes

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilmDevelopOrder extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['referenceFilm'] - string - contains the order reference film
     * $this->attributes['photo'] - string - contains the order photos
     * $this->attributes['price'] - int - contains the film develop order price
     * $this->attributes['state'] - boolean - contains the order state
     * $this->attributes['observation'] - string - contains the order observations
     * $this->attributes['filmOfTheMonth'] - boolean - contains the film of the month
     * $this->attributes['usePermission'] - boolean - contains the user authorization to use their film
     * $this->attributes['created_at'] - timestamp - contains the review creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     * $this->attributes['user_id'] - int - contains the referenced user id
     * $this->user - User - contains the associated User
     */
    protected $fillable = ['referenceFilm', 'photo', 'price', 'state', 'observation', 'filmOfTheMonth', 'usePermission'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getReferenceFilm(): string
    {
        return $this->attributes['referenceFilm'];
    }

    public function setReferenceFilm(string $referenceFilm): void
    {
        $this->attributes['referenceFilm'] = $referenceFilm;
    }

    public function getPhoto(): string
    {
        return $this->attributes['photo'];
    }

    public function setPhoto(string $photo): void
    {
        $this->attributes['photo'] = $photo;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getState(): bool
    {
        return $this->attributes['state'];
    }

    public function setState(bool $state): void
    {
        $this->attributes['state'] = $state;
    }

    public function getObservation(): string
    {
        return $this->attributes['observation'];
    }

    public function setObservation(string $observation): void
    {
        $this->attributes['observation'] = $observation;
    }

    public function getFilmOfTheMonth(): bool
    {
        return $this->attributes['filmOfTheMonth'];
    }

    public function setFilmOfTheMonth(bool $filmOfTheMonth): void
    {
        $this->attributes['filmOfTheMonth'] = $filmOfTheMonth;
    }

    public function getUsePermission(): bool
    {
        return $this->attributes['usePermission'];
    }

    public function setUsePermission(bool $usePermission): void
    {
        $this->attributes['usePermission'] = $usePermission;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function validate($request)
    {
        $request->validate([
            'referenceFilm' => 'required|string',
        ]);
    }
}
