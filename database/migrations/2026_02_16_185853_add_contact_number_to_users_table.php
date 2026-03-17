<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
  Schema::table('users', function (Blueprint $table) {

    if (!Schema::hasColumn('users', 'contact_number')) {
        $table->string('contact_number')->nullable()->after('email');
    }

    if (!Schema::hasColumn('users', 'address')) {
        $table->string('address')->nullable()->after('contact_number');
    }

    if (!Schema::hasColumn('users', 'profile_image')) {
        $table->string('profile_image')->nullable()->after('address');
    }

});

}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['contact_number', 'address', 'profile_image']);
    });
}

};
