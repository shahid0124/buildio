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
			$employeeCount = $teamRepositoryObject->getTeam($teamManager->id);
			$totalCount[] = count($employeeCount);
		}
	return view('showhierarchy.index', compact('totalCount','teamManagerDetails'));
    }
}
