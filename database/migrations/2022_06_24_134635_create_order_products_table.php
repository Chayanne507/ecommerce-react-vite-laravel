<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::disableForeignKeyConstraints();
		Schema::create('order_products', function (Blueprint $table) {
			$table->id();
			$table->unsignedDecimal('price', 12, 2);
			$table->string('name');
			$table->unsignedInteger('quantity');
			$table->unsignedDecimal('price_quantity', 12, 2);
			$table->foreignId('order_id')->constrained()->cascadeOnDelete();
			$table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('order_products');
	}
}
