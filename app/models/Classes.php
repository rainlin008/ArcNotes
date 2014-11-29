<?php



class Classes extends Eloquent
{
    protected $fillable = ['name','id_school','scollaryear','degree','domain','previous','visibility'];
    private $school;
    private $id_location;
    private $city;
    private $id_canton;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';


    public function getCourses()
    {
        return DB::table('courses')->where('id_class','=',$this->id)->get();
    }

    public function getUsers()
    {
        $ids = DB::table('permissions')->where('id_class','=',$this->id)->where('id_rights','!=',15)->lists('id_user');
        return User::whereIn('id',$ids)->get();
    }

    public function getPermissionsTab($id_user)
    {
        $perm = DB::table('permissions')->where('id_user','=',$id_user)->where('id_class','=',$this->id)->first();

        $isCheckRead = 0;
        $isCheckEdition = 0;
        $isCheckCreation = 0;

        if(($perm->id_rights & 4) != 0)
        {
            $isCheckRead = true;
        }
        if(($perm->id_rights & 2) != 0)
        {
            $isCheckEdition = true;
        }
        if(($perm->id_rights & 1) != 0)
        {
            $isCheckCreation = true;
        }

        $rep = [];
        array_push($rep,$isCheckRead);
        array_push($rep,$isCheckEdition);
        array_push($rep,$isCheckCreation);

        return $rep;
    }

    public function getSchoolName()
    {
        $this->school = School::find($this->id_school);
        $this->id_location = $this->school->id_location;
        return $this->school->name;
    }

    public function getCitie()
    {
        $this->city = Cities::find($this->id_location);
        $this->id_canton = $this->city->id_canton;
        return $this->city->name;
    }

    public function getCanton()
    {
        return DB::table('cantons')->find($this->id_canton)->name;
    }
}

