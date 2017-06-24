<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 500)->create();
         $rowCount=0;

        foreach(App\User::all() as $user) {
                   
            if ($user->id == 1) {
                $user->manager_user_id = 0;
                $user->parent_id = NULL;
            } elseif ($user->id < 11) {
                $user->manager_user_id = 1;
                 $user->parent_id = 1;
            } elseif ($user->id < 100) {
                $user->manager_user_id = floor( $user->id / 10 ) + 1;
                if($rowCount==0 && $user->manager_user_id==6 ){
                    $user->parent_id = NULL;
                    $rowCount++;
                }else if($user->manager_user_id==7){
                    $user->parent_id = floor( $user->id / 10 ) + 1; 
                    $rowCount=0;
                 }else{
                    $user->parent_id = floor( $user->id / 10 ) + 1; 
                }         
            } elseif ($user->id < 200) {
                 $user->manager_user_id = 50;
                 if($rowCount==0){
                    $user->parent_id = NULL;
                    $rowCount++;
                 }else{
                 $user->parent_id = 50;
             }
            } elseif ($user->id < 300) {
                 $user->manager_user_id = 150;
                 $user->parent_id = 150;
            } elseif ($user->id < 400) {
                $user->manager_user_id = 250;
                $user->parent_id = 250;
            } else {
                $user->manager_user_id = 350;
                $user->parent_id = 350;
            }
            $user->save();
        }
    }
}
