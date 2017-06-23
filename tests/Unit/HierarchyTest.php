<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\User;

class HierarchyTest extends TestCase
{
    public function testDataExists()
    {
        $users = User::all();
        $this->assertCount(500, $users);
        $this->assertEquals( 6, $users[50]->manager_user_id );
    }

    public function testHierarchyRebuild()
    {
        $repo = $this->app->make('App\TeamRepository' );
        $repo->rebuildHierarchy();
    }

    public function testCheckHierarchy()
    {
        $repo = $this->app->make('App\TeamRepository' );
        $this->assertCount( 499, $repo->getTeam(1));
        $this->assertCount( 9, $repo->getTeam(2));
        $this->assertCount( 10, $repo->getTeam(3));
        $this->assertCount( 10, $repo->getTeam(4));
        $this->assertCount( 10, $repo->getTeam(5));
        $this->assertCount( 411, $repo->getTeam(6));
        $this->assertCount( 10, $repo->getTeam(7));
        $this->assertCount( 10, $repo->getTeam(8));
        $this->assertCount( 10, $repo->getTeam(9));
        $this->assertCount( 10, $repo->getTeam(10));
        $this->assertCount( 401, $repo->getTeam(50));
        $this->assertCount( 301, $repo->getTeam(150));
        $this->assertCount( 201, $repo->getTeam(250));
        $this->assertCount( 101, $repo->getTeam(350));
        $this->assertCount( 0, $repo->getTeam(450));
        // $this->assertEquals([11,12,13,14,15,16,17,18,19], $repo->getTeam(2)->toArray());
        $subset = $repo->getTeam(6)->toArray();
        // print_r($subset);
        // sort( $subset );
        // print_r($subset);
        // $this->assertArraySubset([50,51,52,53,54,55,56,57,58,59,100,101,102], $subset );
    }
}
