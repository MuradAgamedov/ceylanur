<?php namespace Ceylanur\Gallary\Models;

use Model;

/**
 * Model
 */
class Techniques extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
          use \October\Rain\Database\Traits\NestedTree;
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['title'];

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ceylanur_gallary_techniques';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}
