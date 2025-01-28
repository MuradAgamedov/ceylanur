<?php namespace Ceylanur\Gallary\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurGallaryImages3 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_gallary_images', function($table)
        {
            $table->integer('status')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_gallary_images', function($table)
        {
            $table->dropColumn('status');
        });
    }
}
