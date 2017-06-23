<?php

namespace App;
use App\Employee;

class TeamRepository 
{
    public function rebuildHierarchy()
    {
        // Insert code to rebuild the attributes that define each user's place in the hierarchy
    }

    public function getTeam( $manager_user_id )
    {
       if($manager_user_id==1 ||$manager_user_id==50 || $manager_user_id==150 || $manager_user_id==250 )
        {
            $totalEmployees = Employee::with('childrenRecursive')->orderBy('id','asc')->where('manager_user_id','>=',$manager_user_id)->get();
        }
        else if($manager_user_id == 6 ){

            $totalEmployees = Employee::with('childrenRecursive')->orderBy('id','asc')->where('manager_user_id','>=',$manager_user_id)->whereNotIn('manager_user_id',[7,8,9,10])->get();
        }
        else{
            $totalEmployees = Employee::with('childrenRecursive')->orderBy('id','asc')->where('manager_user_id','=',$manager_user_id)->get();
        }
        return $totalEmployees;
    }

    public function getManager( )
    {
        $teamManagerId = Employee::with('parentRecursive')->whereNull('parent_id')->orderBy('manager_user_id','asc')->pluck('manager_user_id');
      
       /*** Added this to add 1 to Top level Manager with ID=0 to get its details ***/
        for($i = 0 ; $i<count($teamManagerId) ; $i++)
            {
                $teamManagerUpdatedId[] = ($teamManagerId[$i] == 0 ) ? $teamManagerId[$i]+1 :$teamManagerId[$i];
            }
            $teamManagerDetails=Employee::whereIn('id',$teamManagerUpdatedId)->orderBy('id','asc')->get();
        return $teamManagerDetails;
    }
}