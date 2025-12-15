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
        Schema::create('role_abilities', function (Blueprint $table) {
            $table->id();// معرف فريد لكل صلاحية مرتبطة بدور
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');// تربط الصلاحية بالدور المحدد
            $table->string('ability');// تحدد اسم الصلاحية
            $table->enum('type', ['allow', 'deny', 'inherit']);// تحدد ما إذا كانت الصلاحية مسموحة، مرفوضة، أو موروثة
            $table->unique(['role_id', 'ability']);// هي تضمن عدم تكرار الصلاحية لنفس الدور
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_abilities');
    }
};
