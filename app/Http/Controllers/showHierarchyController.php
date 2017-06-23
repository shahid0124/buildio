<?php

namespace App\Http\Controllers;
use App\TeamRepository;
use App\Employee;
use App\User;
use Illuminate\Http\Request;

class showHierarchyController extends Controller
{
    public function showHierarchy(){
	
	$teamRepositoryObject= new TeamRepository;
	$teamManager = $teamRepositoryObject->getManager();
	$teamManagerDetails = array($teamManager);
	foreach($teamManager as $teamManager)
		{
			
			// $manager_Id = ($teamManager->manager_user_id == 0 ) ? $teamManager->manager_user_id :$teamManager->manager_user_id;
			
			// print($manager_Id);
			// if($teamManager->id == 0 || )

			$employeeCount = $teamRepositoryObject->getTeam($teamManager->id);

			$totalCount[] = count($employeeCount);
		}
		// print(count($totalCount));
	return view('showhierarchy.index', compact('totalCount','teamManagerDetails'));
    }
}
