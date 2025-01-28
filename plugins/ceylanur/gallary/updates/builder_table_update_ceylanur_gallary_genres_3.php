<?php namespace Ceylanur\Gallary\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurGallaryGenres3 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_gallary_genres', function($table)
        {
            $table->integer('status')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_gallary_genres', function($table)
        {
            $table->dropColumn('status');
        });
    }
}
