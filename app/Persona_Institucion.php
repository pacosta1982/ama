<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Persona_Institucion
 * @package App\Models
 * @version April 25, 2019, 11:29 am UTC
 *
 * @property \App\Models\Parentesco parentesco
 * @property \App\Models\Persona persona
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property integer cantidad
 * @property integer parentesco_id
 * @property integer persona_id
 */
class Persona_Institucion extends Model
{
    use SoftDeletes;

    public $table = 'persona_institucion';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cantidad',
        'parentesco_id',
        'persona_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cantidad' => 'integer',
        'parentesco_id' => 'integer',
        'persona_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cantidad' => 'required',
        'parentesco_id' => 'required',
        'persona_id' => 'required'
    ];

    public function categoriaescolar() {
        return $this->hasOne('App\Models\Institucion_Cat','id','institucion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
}
