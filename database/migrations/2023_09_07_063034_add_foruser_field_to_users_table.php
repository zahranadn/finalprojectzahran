<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForuserFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('jeniskelaminuser');
            $table->string('alamatuser');
            $table->integer('nohandphoneuser');
            $table->integer('noidentitasuser');
            $table->text('fotoidentitasuser');
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
            $table->dropColumn('jeniskelaminuser');
            $table->dropColumn('alamatuser');
            $table->dropColumn('nohandphoneuser');
            $table->dropColumn('noidentitasuser');
            $table->dropColumn('fotoidentitasuser');
        });
    }
}
