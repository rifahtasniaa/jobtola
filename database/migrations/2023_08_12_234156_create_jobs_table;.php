<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('short_description');
            $table->text('description');
            $table->text('benefits');
            $table->unsignedSmallInteger('job_type')->default(0);
            $table->unsignedSmallInteger('employment_type')->default(0);
            $table->string('location');
            $table->string('salary');
            $table->date('deadline');
            $table->boolean('hiring')->default(0);
            $table->text('office_address')->nullable();

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')
                ->on('companies')->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
