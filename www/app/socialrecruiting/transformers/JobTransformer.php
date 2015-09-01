<?php
/**
 * Created by PhpStorm.
 * User: joshnykamp
 * Date: 5/8/15
 * Time: 8:06 AM
 */

namespace App\socialrecruiting\transformers;


class JobTransformer extends Transformer{

    public function transform($job)
    {
        return [
            'id' => $job['id'],
            'client_name' => $job['client_name'],
            'title' => $job['title'],
            'address' => $job['address_1'],
            'address_2' => $job['address_2'],
            'city' => $job['city'],
            'state' => $job['state'],
            'zip' => $job['zip'],
            'country' => $job['country'],
            'job_id' => $job['job_id'],
            'description' => $job['description'],
            'category' => $job['category'],
            'sub_category' => $job['sub_category'],
            'recruiter_id' => $job['recruiter_id'],
            'recruiter_first' => $job['recruiter_first'],
            'recruiter_last' => $job['recruiter_last'],
            'language' => $job['language'],
            'market' => $job['market'],
            'recruiter_email' => $job['recruiter_email'],
            'start_date' => $job['start_date'],
            'end_date' => $job['end_date']
        ];

    }
}