<?php

namespace app\controllers\portal;
use core\Controller;



class AboutController extends Controller
{
    public function index()
    {
        // Load the about view
        return Controller::view('about.view',[
                $heading = 'About Us'
        ]);
    }
}