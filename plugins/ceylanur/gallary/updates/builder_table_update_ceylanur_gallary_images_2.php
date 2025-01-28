<?php namespace Ceylanur\Gallary\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurGallaryImages2 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_gallary_images', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_gallary_images', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
