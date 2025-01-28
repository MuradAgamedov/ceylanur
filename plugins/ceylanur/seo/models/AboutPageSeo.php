<?php namespace Ceylanur\Seo\Models;

use Model;

/**
 * Model
 */
class AboutPageSeo extends Model
{
    use \October\Rain\Database\Traits\Validation;
     public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
     public $translatable = ['meta_title', 'meta_keywords', 'meta_description'];

    /**
     * @var bool timestamps are disabled.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ceylanur_seo_about_page';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}
