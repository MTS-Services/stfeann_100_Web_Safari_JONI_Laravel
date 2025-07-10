<?php

use App\Http\Traits\AuditColumnsTrait;
use App\Models\About;
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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sort_order')->default(0);
            $table->string('title'); // New: Title of the about section
            $table->string('image')->nullable(); // New: Image path (optional)
            $table->text('description'); // Existing
            $table->tinyInteger('status')->default(About::STATUS_INACTIVE);
            $table->text('our_mission'); // New: Our Mission
            $table->text('vission'); // New: Vision
            $table->text('sustainable_commitment');

            $table->timestamps();
            $table->softDeletes();
            $this->addAdminAuditColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
