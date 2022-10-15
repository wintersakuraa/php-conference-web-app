<?php

/*
 * Controller class for operating home page
 */

class HomeController extends Controller
{
    public function index()
    {
        $this->view('/Home/index');
    }
}