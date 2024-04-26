<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstName')->after('id');
            $table->string('middleName')->nullable()->after('firstName');
            $table->string('lastName')->after('middleName');
            $table->string('mobileNumber');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstName');
            $table->dropColumn('middleName')->nullable();
            $table->dropColumn('lastName');
            $table->dropColumn('mobileNumber');
        });
    }
};
