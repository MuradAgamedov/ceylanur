<?php namespace Ceylanur\Seo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurSeoGallaryPage2 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_seo_gallary_page', function($table)
        {
            $table->text('links')->nullable();
            $table->text('scripts')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_seo_gallary_page', function($table)
        {
            $table->dropColumn('links');
            $table->dropColumn('scripts');
        });
    }
}
