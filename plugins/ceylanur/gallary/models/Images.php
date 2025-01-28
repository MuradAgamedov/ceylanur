<?php

namespace Ceylanur\Gallary\Models;

use Model;
use Illuminate\Support\Facades\DB;

/**
 * Model
 */
class Images extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\NestedTree;

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = ['title', 'short_description', 'description', 'for_buy'];

    protected $dates = ['deleted_at'];

    public $table = 'ceylanur_gallary_images';

    public $rules = [];

    public $belongsTo = [
        'genre' => [Genres::class],
        'technique' => [Techniques::class]
    ];

    public $attachOne = [
        'image' => \System\Models\File::class
    ];

    protected $appends = ['translated_title', 'translated_short_description']; // Buraya `translated_short_description` əlavə etdik

    /**
     * `rainlab_translate_attributes` cədvəlindən `title`-in tərcüməsini qaytarır.
     */
    public function getTranslatedTitleAttribute()
    {
        return $this->getTranslatedAttribute('title');
    }

    /**
     * `rainlab_translate_attributes` cədvəlindən `short_description`-ın tərcüməsini qaytarır.
     */
    public function getTranslatedShortDescriptionAttribute()
    {
        return $this->getTranslatedAttribute('short_description');
    }

    /**
     * Tərcümə olunmuş atributu götürən ümumi metod.
     */
    private function getTranslatedAttribute($attribute)
    {
        $locale = app()->getLocale(); // Aktiv dil
        $translatedData = DB::table('rainlab_translate_attributes')
            ->where('model_type', self::class)
            ->where('locale', $locale)
            ->where('model_id', $this->id)
            ->value('attribute_data');

        if ($translatedData) {
            $attributeArray = json_decode($translatedData, true);
            return $attributeArray[$attribute] ?? $this->$attribute;
        }

        return $this->$attribute; // Əgər tərcümə yoxdursa, orijinal dəyəri qaytar
    }
}

