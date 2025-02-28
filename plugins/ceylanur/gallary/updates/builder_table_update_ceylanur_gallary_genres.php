<?php namespace Ceylanur\Gallary\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurGallaryGenres extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_gallary_genres', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_gallary_genres', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
        });
    }
}
