<?php
//
//namespace Tests\Unit;
//
//use App\Models\User;
//use Illuminate\Support\Facades\DB;
//use Tests\TestCase;
//
//class UserSqlTest extends TestCase
//{
//    public function testGetUsername()
//    {
//        DB::table('users')->insert([
//            'username' => 'john_doe',
//        ]);
//        $username = DB::table('users')->where('username', 'john_doe')->value('username');
//        $this->assertEquals('john_doe', $username);
//    }
//
//
//    public function test_getRouteKeyName()
//    {
//        $user =  User::find(1);
//        $routeKeyName = $user->getRouteKeyName();
//        $this->assertEquals('username', $routeKeyName);
//    }
//}
