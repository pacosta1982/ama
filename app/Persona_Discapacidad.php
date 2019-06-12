<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Persona_Discapacidad
 * @package App\Models
 * @version April 24, 2019, 6:57 pm UTC
 *
 * @property \App\Models\Discapacidad discapacidad
 * @property \App\Models\Persona persona
 * @property integer discapacidad_id
 * @property integer persona_id
 */
class Persona_Discapacidad extends Model
{
    use SoftDeletes;

    public $table = 'persona_discapacidad';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'discapacidad_id',
        'persona_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'discapacidad_id' => 'integer',
        'persona_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'discapacidad_id' => 'required',
        'persona_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function discapacidad()
    {
        return $this->belongsTo(\App\Models\Discapacidad::class, 'discapacidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'persona_id');
    }
}
