<?php

use App\Http\Traits\AuditColumnsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sort_order')->default(0);
            $table->unsignedBigInteger('product_id');
            $table->string('image')->index();
            $table->boolean('is_primary')->default(false)->index();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            //   $table->index(['product_id', 'sort_order']);
            // $table->index(['product_id', 'is_primary']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
