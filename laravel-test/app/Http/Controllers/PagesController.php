<?php

namespace App\Http\Controllers;


class PagesController extends Controller
{
    /**
     * Display the view showing the contact us data
     * @param none
     * @return Response
     */
    protected function contact() {
        return view('pages.contactus');
    }

    /**
     * Display the view showing the about us data
     * @param none
     * @return Response
     */
    public function about() {
        return view('pages.aboutus');
    }

    public function profile() {
        return view('pages.profile');
    }
}