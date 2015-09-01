<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {

    protected $fillable = [
        'client_name',
        'title',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip',
        'country',
        'job_id',
        'description',
        'category',
        'sub_category',
        'recruiter_id',
        'recruiter_first',
        'recruiter_last',
        'language',
        'market',
        'recruiter_email',
        'start_date',
        'end_date'
    ];

    protected $dates = ['start_date', 'end_date'];

}
