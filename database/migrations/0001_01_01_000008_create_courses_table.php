<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('venue_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('lecturer_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->string('audience')->nullable();
            $table->smallInteger('capacity')->unsigned()->nullable();
            $table->decimal('price')->unsigned()->default(0);
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamp('opened_at')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->json('outcomes')->nullable();
            $table->json('faqs')->nullable();
            $table->json('tags')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->index(['opened_at', 'closed_at']);
        });

        Schema::create('modules', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('section')->nullable();
            $table->text('description')->nullable();
            $table->json('tags')->nullable();
            $table->integer('position')->unsigned()->nullable()->index();
            $table->timestamps();

            $table->index(['course_id', 'position']);
        });
    }
};
