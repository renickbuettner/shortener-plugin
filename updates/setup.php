<?php namespace Renick\Shortener\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Setup extends Migration
{
    public function up()
    {
        Schema::create('renick_shortener_entries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('slug')->unique();
            $table->string('target');
            $table->text('meta')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('renick_shortener_entries');
    }
}
