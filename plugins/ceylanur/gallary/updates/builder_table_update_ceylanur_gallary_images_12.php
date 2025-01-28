<?php namespace Ceylanur\Gallary\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurGallaryImages12 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_gallary_images', function($table)
        {
            $table->integer('first_image_on_home_page')->nullable();
            $table->integer('second_image_on_home_page')->nullable();
            $table->integer('third_image_on_home_page')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_gallary_images', function($table)
        {
            $table->dropColumn('first_image_on_home_page');
            $table->dropColumn('second_image_on_home_page');
            $table->dropColumn('third_image_on_home_page');
        });
    }
}
