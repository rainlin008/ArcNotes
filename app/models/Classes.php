<?php



class Classes extends Eloquent
{
    protected $fillable = ['name','id_school','scollaryear','degree','domain','previous','visibility'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';



}