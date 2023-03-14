<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    protected $fillable = ['quantity', 'order_id', 'product_id'];

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
        return $this->attributes['order_id']; 
    }

    public function setOrderId($orderId) 
    { 
        $this->attributes['order_id'] = $orderId; 
    } 

    public function getProductId() 
    { 
        return $this->attributes['product_id']; 
    } 

    public function setProductId($productId) 
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
        return $this->attributes['created_at'];
    }

    public function getUpdate_at(): timestamp
    {
        return $this->attributes['updated_at'];
    }

    public static function validate($request) 
    { 
        $request->validate([
            "price" => "required|numeric|gt:0",
            "quantity" => "required|numeric|gt:0", 
            "product_id" => "required|exists:products,id", 
            "order_id" => "required|exists:orders,id",
        ]); 
    }
}
