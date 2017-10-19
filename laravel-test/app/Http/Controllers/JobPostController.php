<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == 1) {
            return view('postings/jobposting')
                ->with([
                    'companyName' => '7-Eleven',
                    'jobTitle' => 'Store Manager',
                    'jobDescription' => 'We are seeking a 7- Eleven Store Manager to join our team! You will be responsible for overseeing and coordinating the activities of the retail sales team.
                                             Responsibilities:
                                                Supervise team of retail sales workers
                                                Adjust daily schedule for shift personnel to ensure optimal efficiency
                                                Train and evaluate employees
                                                Track monthly results and trends for business forecasting
                                                Resolve escalated customer complaints
                                                inventory and cash control
                                                resolve employees issues
                                                maintain store image
                                                ​Qualifications:
                                                Previous experience in retail, customer service, or other related fields
                                                Ability to thrive in a fast-paced environment
                                                Excellent written and communication skills
                                                Strong leadership qualities'])
                ->with('contacts',["jobs@seveneleven.com",
                    "604.555.1212",
                    "123 Main Street, North Vancouver BC Canada"]);

        } else if ($id == 2) {
            return view('postings.jobposting')->with([
                'companyName' => 'Facebook',
                'jobTitle' => 'Marketing Sales',
                'jobDescription' => 'Have a passion for social media?  Interested in launching a career in social media working for Facebook?  Revana is currently seeking Marketing Experts to represent Facebook in Phoenix, Arizona. Come learn from the largest social media platform in the world and launch your career. Our marketing experts have moved on to social media management roles throughout the industry. We are looking for aggressive, people to people, success oriented, social media sales agents to represent Facebook to SMB customers throughout the US. Successful candidates must be able to thrive in an environment that is fast paced, competitive, and constantly changing. You must be an individual who is driven by obtaining personal goals and a strong desire to be the best on your team. Are you a motivated, entrepreneurial professional -- a problem solver who is ready to make an impact and ready for a job where you can have some fun too.'
            ]);
        } else {

            return view('postings.jobposting')->with([
                'companyName' => 'BCIT',
                'jobTitle' => 'Nephrology Nursing Instructor',
                'jobDescription' => 'BCIT is seeking a temporary, full-time Instructor to join our Nephrology Nursing Specialty team in the Bachelor of Science, Specialty Nursing program. We provide innovative education through leadership, scholarship, and collaboration, to advance excellence in Specialty Nursing practice in the global healthcare environment. We aspire to be integral to improved health outcomes for all people requiring specialized nursing care: provincially, nationally and globally. We invite you to join our creative and committed team of educators who are grounded in participatory and learner-centered practice, education and research. '
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
