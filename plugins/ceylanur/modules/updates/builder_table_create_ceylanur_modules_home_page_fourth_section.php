<?php namespace Ceylanur\Modules\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurModulesHomePageFourthSection extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_modules_home_page_fourth_section', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('first_video_title')->nullable();
            $table->text('first_video_short_description')->nullable();
            $table->string('second_video_title')->nullable();
            $table->text('second_video_short_description')->nullable();
            $table->string('third_vido_title')->nullable();
            $table->text('third_video_short_description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_modules_home_page_fourth_section');
    }
}
