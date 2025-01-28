<?php namespace Ceylanur\Modules\Models;

use Model;

/**
 * Model
 */
class HomePageFourthDescription extends Model
{
    use \October\Rain\Database\Traits\Validation;
       public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['first_video_title', 'first_video_short_description', 'second_video_title', "second_video_short_description", "third_vido_title", "third_video_short_description"];

    /**
     * @var bool timestamps are disabled.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ceylanur_modules_home_page_fourth_section';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];
      public $attachOne = [
        'first_video' => \System\Models\File::class,
        'second_video' => \System\Models\File::class,
         'third_video' => \System\Models\File::class,
    ];

}
