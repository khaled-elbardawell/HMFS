<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id')->nullable()->after('name');
            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->tinyInteger('status')->comment("All Actions => 3 | just edit => 2 | just delete => 1 | Prevent All Actions => 0")->default(3)->after('organization_id');
            // edit , delete (true) => 3 | just => edit (true) => 2 | just => delete (true) => 1 | Prevent All Actions => 0

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('organization_id');
            $table->dropColumn('status');
        });
    }
}
