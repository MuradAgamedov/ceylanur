<?php namespace Ceylanur\Gallary\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurGallaryImages11 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_gallary_images', function($table)
        {
            $table->integer('see')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_gallary_images', function($table)
        {
            $table->integer('see')->default(null)->change();
        });
    }
}
