<?php


namespace App\Http\Controllers;


use App\Events\TestEvent;

class EventController extends Controller
{

    public function index()
    {
        event(new TestEvent());




    }

}
