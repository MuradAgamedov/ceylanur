<?php namespace Ceylanur\Gallary\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurGallaryImages10 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_gallary_images', function($table)
        {
            $table->text('availability')->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_gallary_images', function($table)
        {
            $table->string('availability', 10)->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
