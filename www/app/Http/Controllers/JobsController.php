<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

use App\Job;
use App\socialrecruiting\transformers\JobTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class JobsController extends ApiController {

    protected $jobTransformer;

    /**
     * JobsController constructor.
     * @param $jobTransformer
     */
    public function __construct(JobTransformer $jobTransformer)
    {
        $this->jobTransformer = $jobTransformer;

		$this->middleware('auth.basic', ['only' => 'store']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jobs = Job::all();

        return $this->respond([
            'data' => $this->jobTransformer->transformCollection($jobs->all())
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(!Input::get('client_name') or (!Input::get('title')) or (!Input::get('description'))) {
			//422 unprocessable entity
			return $this->respondNotValidated('Parameters failed validation for creating a new job');
		}

		Job::create(Input::all());

		return $this->respondCreated('Job successfully created.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$job = job::find($id);
        if(!$job) {
            return $this->respondNotFound('Job does not exist');
        }
        return Response::json([
            'data' => $this->jobTransformer->transform($job)
        ], 200);
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
