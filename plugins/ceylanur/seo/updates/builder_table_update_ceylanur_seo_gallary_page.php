<?php namespace Ceylanur\Seo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurSeoGallaryPage extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_seo_gallary_page', function($table)
        {
            $table->renameColumn('meta_descriptions', 'meta_description');
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_seo_gallary_page', function($table)
        {
            $table->renameColumn('meta_description', 'meta_descriptions');
        });
    }
}
