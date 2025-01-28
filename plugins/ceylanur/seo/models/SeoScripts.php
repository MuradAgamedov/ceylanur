<?php namespace Ceylanur\Seo\Models;

use Model;

/**
 * Model
 */
class SeoScripts extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
          use \October\Rain\Database\Traits\NestedTree;
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['title_for_search'];

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ceylanur_seo_scripts';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}
