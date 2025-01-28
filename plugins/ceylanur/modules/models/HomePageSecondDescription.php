<?php namespace Ceylanur\Modules\Models;

use Model;

/**
 * Model
 */
class HomePageSecondDescription extends Model
{
    use \October\Rain\Database\Traits\Validation;
     public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['title', 'text', 'image_title', 'image_text', "image_short_description"];

    /**
     * @var bool timestamps are disabled.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ceylanur_modules_home_page_second_section';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];
    
       public $attachOne = [
        'image' => \System\Models\File::class,
    ];

}
