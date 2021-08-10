<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url')->unique();
            $table->timestamps();
        });

        Schema::table('projects', function (Blueprint $table){
            $table->foreignId('category_id')
            ->nullable()
            ->after('id')
            ->constrained()
            ->onUpdate('cascade') // si se actuliza el id de una categoria igual se actualizara en los registros
            ->onDelete('set null'); // si se eleimina una categoria el valor de los projectos regresara a null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function(Blueprint $table){
            $table->dropForeign('projects_category_id_foreign');
            $table->dropColumn('category_id');
        });

        Schema::dropIfExists('categories');
    }
}
