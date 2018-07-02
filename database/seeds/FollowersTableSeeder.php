<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=User::all();
        $user=$users->first();

        $followers=$users->slice(1);
        $follwer_ids=$followers->pluck('id')->toArray();

        $user->follow($follwer_ids);

        foreach ($followers as $follower) {
            $follower->follow(1);
        }
    }
}
