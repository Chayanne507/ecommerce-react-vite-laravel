<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
	use HasFactory;

	protected $casts = [
		'user_data' => 'object',
		'discount' => 'object',
	];

	protected $guarded  = [];


	public function order_products(): HasMany
	{
		return $this->hasMany(OrderProduct::class);
	}
	public function payment(): HasOne
	{
		return $this->hasOne(Payment::class);
	}
}
