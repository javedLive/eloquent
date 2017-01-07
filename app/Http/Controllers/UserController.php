<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bear;
use App\Fish;
use App\Tree;
use App\Picnic;
use Illuminate\Database\Eloquent\Model;
class UserController extends Controller
{
    public function getUser(){

  		 	
		
		# CREATING RECORDS

		// create a bear
	    Bear::create(array(
	        'name'         => 'Super Cool',
	        'type'         => 'Black',
	        'danger_level' => 1
	    ));

	    // alternatively you can create an object, assign values, then save
	    $bear               = new Bear;

	    $bear->name         = 'Super Cool';
	    $bear->type         = 'Black';
	    $bear->danger_level = 1;

	    // save the bear to the database
	    $bear->save();

    	# GETTING AND FINDING RECORDS
   		$bears = Bear::all();
    	
    	// find a specific bear by id
    	$bear = Bear::find(1);
    	
    	// find a bear by a specific attribute
    	$bearLawly = Bear::where('name', '=', 'Lawly')->first();
    	
    	// find a bear with danger level greater than 5
    	$dangerousBears = Bear::where('danger_level', '>', 5)->get();
    	
    	
		#	First vs Get When querying the database and creating where statements, you will have to use get() or first().
		#	First will return only one record and get will return an array of records that you will have to loop over.

    	# UPDATING RECORDS

    	$lawly = Bear::where('name', '=', 'Lawly')->first();

	    // change the attribute
	    $lawly->danger_level = 10;

	    // save to our database
	    $lawly->save();
	   
	  	# DELETING RECORDS 

	   // find and delete a record
	    $bear = Bear::find(1);
	    $bear->delete();

	    // delete a record 
	    Bear::destroy(1);

	    // delete multiple records 
	    Bear::destroy(1, 2, 3);

	    // find and delete all bears with a danger level over 5
	    Bear::where('danger_level', '>', 5)->delete();	

	    # Querying Relationships

	    #ONE TO ONE RELATIONSHIP

	     // find a bear named Adobot

	    $adobot = Bear::where('name', '=', 'Adobot')->first();

	    // get the fish that Adobot has

	    $fish = $adobot->fish;

	    // get the weight of the fish Adobot is going to eat
	    $fish->weight;			

	    // alternatively you could go straight to the weight attribute
	 	$adobot->fish->weight;	


	 	# ONE TO MANY RELATIONSHIPS
	 	$lawly = Bear::where('name', '=', 'Lawly')->first();

	    foreach ($lawly->trees as $tree)
	        echo $tree->type . ' ' . $tree->age."</br>";
	  

	    # MANY TO MANY RELATIONSHIP		

	     // get the picnics that Cerms goes to ------------------------
	    $cerms = Bear::where('name', '=', 'Cerms')->first();

	    // get the picnics and their names and taste levels
	    foreach ($cerms->picnics as $picnic) 
	        echo $picnic->name . ' ' . $picnic->taste_level."</br>";

	    // get the bears that go to the Grand Canyon picnic -------------
	    $grandCanyon = Picnic::where('name', '=', 'Grand Canyon')->first();

	    // show the bears
	    foreach ($grandCanyon->bears as $bear)
	        echo $bear->name . ' ' . $bear->type . ' ' . $bear->danger_level."</br>"; 

	    # Eloquent date filtering: whereDate() and other methods

		$bear = Bear::whereDate('created_at', '=', date('Y-m-d'))->get();
		$bear = Bear::whereDay('created_at', '=', date('d'))->get();
		$bear = Bear::whereMonth('created_at', '=', date('m'))->get();
		$bear = Bear::whereYear('created_at', '=', date('Y'))->get();


 
 
    }
}
