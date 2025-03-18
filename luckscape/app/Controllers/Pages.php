<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function contact(): string
    {
        return view('contact');
    }

    public function privacyPolicy(): string
    {
        return view('privacy-policy');
    }

    public function terms(): string
    {
        return view('terms');
    }
}
