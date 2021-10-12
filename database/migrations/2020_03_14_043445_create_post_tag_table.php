<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('post_id');//mag base ka ane kung unsa ang naa sa imong model make sure kung unsay name sa model then e lowercase nimo tapos underscore then id
            $table->integer('tag_id');//mag base ka ane kung unsa ang naa sa imong model make sure kung unsay name sa model then e lowercase nimo tapos underscore then id

             $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
