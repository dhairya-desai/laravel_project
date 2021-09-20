<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    
    
    public function run()
    {
        
      // factory('App\User',10)->create();
      \App\Models\Post::factory()->count(10)->create(); 
      User::factory(100)->create()->each(function($user){
       $user->posts()->save(Post::factory()->make());
      });
    }
}
