<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;

use App\Models\People;

class UpdateController extends Controller
{
    private $_api_url = 'https://swapi.dev/api/';
    private $_categories = ['people', 'planets', 'species'];
    
    // @dev ENDPOINT /update
    // @dev updates all category tables in the db.
    public function index() {
        // @dev TODO
    }

    // @dev ENDPOINT /update/{category}
    // @dev updates a specific category table in the db.
    public function update($category) {
        if(!in_array(strtolower($category), $this->_categories)) {
            return response("ERROR| Invalid category", 400);
        }

        // $all = JSONHelper::readJSONFile('data_'.$category.'.json'); // from local json file
        $all = $this->readAllPages($this->_api_url.$category); // from url

        switch($category) {
            case 'people':
                    $this->updatePeople($all);
                break;
            case 'planets':
                break;
            case 'species':
                break;
        }

        return response("SUCCESS| updated ".$category , 200);
    }

    // @dev % current limitation is that the id of people is derived from the array indexes passed in with $people
    // @dev truncates all entries in the "people" table and saves each person again using data from the api responce.
    private function updatePeople($people) {
        People::truncate();
        
        for($id = 0; $id < count($people); $id++) {
            $this->savePerson($id, $people[$id]);
        }
    }

    private function savePerson($id, $person) {
        $person_model = new People();

        $person_model->forceFill($person);
        $person_model->id = $id;

        $person_model->save();
    }

    

    // @dev recursivly reads each page and returns a merged array of all "results".
    private function readAllPages($url) {
        $all = array();

        $data = ResponseHelper::getResponseAsArray('GET', $url);
        $all = array_merge($all, $data['results']);

        $next = $data['next'];
        if($next) {
            sleep(1); // @dev simple rate throttling for api fetch.
            $all = array_merge($all, $this->readAllPages($next));
        }

        return $all;
    }


    
}
