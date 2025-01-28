<?php namespace Ceylanur\Seo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurSeoContactPage extends Migration
{
    public function up()
    {
        Schema::rename('ceylanur_seo_cpntact_page', 'ceylanur_seo_contact_page');
    }
    
    public function down()
    {
        Schema::rename('ceylanur_seo_contact_page', 'ceylanur_seo_cpntact_page');
    }
}
