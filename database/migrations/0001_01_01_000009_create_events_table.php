<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('venue_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type');
            $table->text('description')->nullable();
            $table->string('status');
            $table->smallInteger('capacity')->unsigned()->nullable();
            $table->decimal('price')->unsigned()->default(0);
            $table->timestamp('started_at');
            $table->timestamp('ended_at');
            $table->timestamps();

            $table->index('status');
            $table->index(['started_at', 'ended_at']);
        });
    }
};
