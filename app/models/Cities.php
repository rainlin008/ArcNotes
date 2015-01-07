<?php



class Cities extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities';

    private $name;
    private $zipcode;

    public function getList()
    {
        return DB::table('cities')->distinct()->lists('name','id');
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

}
