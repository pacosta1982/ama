<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PersonaEnfermedad
 * @package App\Models
 * @version June 6, 2019, 5:36 pm UTC
 *
 * @property \App\Models\Enfermedad enfermedad
 * @property \App\Models\Persona persona
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property integer enfermedad_id
 * @property integer persona_id
 */
class PersonaEnfermedad extends Model
{
    use SoftDeletes;

    public $table = 'persona_enfermedad';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'enfermedad_id',
        'persona_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'enfermedad_id' => 'integer',
        'persona_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'enfermedad_id' => 'required',
        'persona_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function enfermedad()
    {
        return $this->belongsTo(\App\Models\Enfermedad::class, 'enfermedad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'persona_id');
    }
}
