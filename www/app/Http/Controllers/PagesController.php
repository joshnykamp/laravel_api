<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Company;

use App\Job;
use Illuminate\Http\Request;

class PagesController extends Controller {
    protected $company;

    public function __construct(Request $request) {
        $this->company = $this->getCompany($request->root());
    }

	public function index() {
        $company = $this->company;

        /*
         * Lets move this to a class so we can make it more abstract
         * Grab a company ID based on the URI then render the correct job/style/category
         * information based on that.
         */
        if($company->layout == 1) {
            return view('tr.home')->with(['company_name' => $company->company_name]);
        }

        return view('pages.home');
    }

    public function about() {
        $first = 'Josh';
        $last = 'Nykamp';

        return view('pages.about', compact('first', 'last'));
    }

    public function contact() {
        return view('pages.contact');
    }

    public function xml() {
        $xml = file_get_contents(public_path('xml') . '/test.xml');
        $xml = simplexml_load_string( $xml , null , LIBXML_NOCDATA );
        $xml =json_encode($xml);
        $xml = json_decode($xml, TRUE);
        $client_name = $xml['@attributes']['client_name'];

        foreach($xml['job'] as $xml_job) {
            $job = new Job();
            $job->client_name = $client_name;
            $job->title = $xml_job['title'];
            $job->address_1 = $xml_job['location_address1'];
            $job->address_2 = $xml_job['location_address2'];
            $job->city = $xml_job['location_city'];
            $job->state = $xml_job['location_state'];
            $job->zip = $xml_job['location_zip'];
            $job->country = $xml_job['location_country'];
            $job->job_id = $xml_job['job_id'];
            $job->description = $xml_job['description'];
            $job->category = $xml_job['category'];
            $job->sub_category = $xml_job['subcat'];
            $job->recruiter_id = $xml_job['recruiter_id'];
            $job->recruiter_first = $xml_job['recruiter_name_first'];
            $job->recruiter_last = $xml_job['recruiter_name_last'];
            $job->language = $xml_job['language'];
            $job->market = $xml_job['market'];
            /** this is causing an error when blank because it creates an empty array */
            //$job->recruiter_email = $xml['job']['recruiter_email'];
            $job->start_date = strtotime($xml_job['date_start']);
            $job->end_date = strtotime($xml_job['date_end']);
            $job->save();
        }

    }
    public function getCompany($request) {
        $company = Company::where('domain', '=', 'http://trapi.com')->first();
        //$id = $company->id;
        /*
         * perform a look up for the company
         * find the id and the layout, styles whatever else we need to render the correct template.
         */

        return $company;
    }
}
