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
        Schema::table('users', function (Blueprint $table) {
            $table->float('height')->default(0)->after('password');
            $table->float('weight')->default(0)->after('height');
            $table->set('gender', ['Male', 'Female', 'Unset'])->default('Unset')->after('weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('gender');
        });
    }
};
