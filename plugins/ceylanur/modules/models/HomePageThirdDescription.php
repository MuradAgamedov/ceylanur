<?php namespace Ceylanur\Modules\Models;

use Model;

/**
 * Model
 */
class HomePageThirdDescription extends Model
{
    use \October\Rain\Database\Traits\Validation;
     public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['title', 'text', 'section_title', "section_subtitle_text"];

    /**
     * @var bool timestamps are disabled.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ceylanur_modules_home_page_third_section';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];


 public $attachOne = [
        'video' => \System\Models\File::class,
    ];
}
