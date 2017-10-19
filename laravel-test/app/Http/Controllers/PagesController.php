<?php
/**
 * Created by PhpStorm.
 * User: sheldonlynn
 * Date: 2017-10-19
 * Time: 9:52 AM
 */

namespace App\Http\Controllers;

use app\Http\Controllers\Controller;


class PagesController
{
    public function contact() {
        return view("pages.contactus");
    }

    public function about() {
        return view("pages.about");
    }
}