<?php namespace Ceylanur\Messages\Models;

use Model;

/**
 * Model
 */
class MessagesContact extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\NestedTree;
    protected $guarded = [];
    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ceylanur_messages_contact';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}
