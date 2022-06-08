<?php

namespace App\Http\Controllers;

use App\Models\People;


class PeopleController extends Controller
{

    // /people
    public function index() { 
        $people = People::all();
        return $people;
    }

    // /people/{id}
    public function get($id) {
        $people = People::findOrFail($id);
        return $people;
    }

}
