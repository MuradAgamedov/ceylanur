<?php namespace Ceylanur\Copyrightatestation\Models;

use Model;

/**
 * Model
 */
class CopirightAtestation extends Model
{
    use \October\Rain\Database\Traits\Validation;
  protected $guarded = [];
    /**
     * @var bool timestamps are disabled.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ceylanur_copyrightatestation_main';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}
