<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['quantity'] - int - contains the item quantity
     * $this->attributes['price'] - int - contains the item price
     * $this->products - Product[] - contains the associated products
     * $this->orders - Order[] - contains the associated orders
     * $this->attributes['created_at'] - timestamp - contains the product creation date 
     * $this->attributes['updated_at'] - timestamp - contains the product update date
    */

    protected $fillable = ['quantity', 'order', 'product'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id) : void
    {
        $this->attributes['id'] = $id;
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity) : void
    {
        $this->attributes['quantity'] = $quantity;
    }
    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getOrderId() 
    { 
        return $this->attributes['orderId']; 
    }

    public function setOrderId($orderId) 
    { 
        $this->attributes['orderId'] = $orderId; 
    } 

    public function getProductId() 
    { 
        return $this->attributes['productId']; 
    } 

    public function setProductId($productId) 
    { 
        $this->attributes['productId'] = $productId; 
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

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder($order): void
    {
        $this->order = $order;
    }

    public function getCreated_at(): timestamp
    {
        return $this->attributes['date'];
    }

    public function getUpdate_at(): timestamp
    {
        return $this->attributes['date'];
    }


    public static function validate($request) 
    { 
        $request->validate([
            "price" => "required|numeric|gt:0",
            "quantity" => "required|numeric|gt:0", 
            "productId" => "required|exists:products,id", 
            "orderId" => "required|exists:orders,id",
        ]); 
    }
}
