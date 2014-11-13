<?php

class SchoolController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

    public function schoolMaker()
    {
        return View::make('school');
    }

    public function school()
    {
        return View::make('school');
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('schools.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        $rulesValidatorSchool = array( 'name' => 'required|min:4');

        $validator = Validator::make($input, $rulesValidatorSchool);

        if(!$validator->fails()) {

            $school = new School();

            $school->name = $input['name'];

            $school->save();

            Redirect::to('/'); /*TODO view GG school created !*/
        }
        else
        {
            return Redirect::to('school')->withErrors($validator)->withInput();
        }
    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
