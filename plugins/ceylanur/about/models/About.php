<?php namespace Ceylanur\About\Models;

use Model;

/**
 * Model
 */
class About extends Model
{
    use \October\Rain\Database\Traits\Validation;
     public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['first_title','first_text','second_title','second_text' , 'first_text_second'];

    /**
     * @var bool timestamps are disabled.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ceylanur_about_main';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];
    
     public $attachOne = [
        'first_image' => \System\Models\File::class,
        'second_image' => \System\Models\File::class,
    
    ];

}
