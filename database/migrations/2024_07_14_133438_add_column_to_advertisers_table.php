<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisers', function (Blueprint $table) {
            $table->boolean('is_active')->default(1)->after('is_request__process'); // Adjust 'after' to place the column in the desired position
            $table->string('custom_domain')->nullable()->after('is_active'); // Adjust 'after' to place the column in the desired position
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisers', function (Blueprint $table) {
            $table->dropColumn(['is_active', 'custom_domain']);
        });
    }
};
