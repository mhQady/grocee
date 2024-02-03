<?php

use Illuminate\Support\Facades\Schema;
use App\Enums\Product\ProductStatusEnum;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('slug');
            $table->unsignedTinyInteger('status')->default(ProductStatusEnum::PUBlISHED->value);
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->json('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('old_price', 10, 2)->nullable();
            $table->dateTime('sale_ends_at')->nullable();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('slug_ar')->virtualAs('JSON_UNQUOTE(slug->>"$.ar")')->unique();
            $table->string('slug_en')->virtualAs('JSON_UNQUOTE(slug->>"$.en")')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
