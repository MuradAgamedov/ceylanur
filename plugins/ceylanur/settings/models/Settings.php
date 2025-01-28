<?php namespace Ceylanur\Settings\Models;

use Model;

/**
 * Model
 */
class Settings extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
     public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
     public $translatable = ['copywrite_text'];
      
    /**
     * @var bool timestamps are disabled.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ceylanur_settings_main';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];
    
    public $attachOne = [
        'logo' => \System\Models\File::class,
         'favicon' => \System\Models\File::class,
          'success_form_image_first' => \System\Models\File::class,
           'success_form_image_second' => \System\Models\File::class,
            'copyright_modal_image' => \System\Models\File::class,
    ];

}
