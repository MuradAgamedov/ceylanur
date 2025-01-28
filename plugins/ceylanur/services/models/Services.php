<?php namespace Ceylanur\Services\Models;

use Model;

/**
 * Model
 */
class Services extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
     use \October\Rain\Database\Traits\NestedTree;
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['title', "text", 'meta_title', 'meta_keywords', 'meta_description'];

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ceylanur_services_main';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];
    public $attachOne = [
        'image' => \System\Models\File::class,
        'card_image' => \System\Models\File::class,

    ];
}
