<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //COLONNA PER FK
            $table->unsignedBigInteger('category_id')->nullable()->after('slug');

            //DEFINIZIONE FK OnDelete se viene cancellato qualcosa valore null
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //1 rimozione relazione
             $table->dropForeign('posts_category_id_foreign');
          
            //2 rimozione effettiva della colonna creata su
            $table->dropColumn('category_id');
        });
    }
}
