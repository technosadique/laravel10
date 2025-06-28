<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posts;


class PostSeeder extends Seeder
{
    public function run(): void
    {
        Posts::create([
        'title' => 'test',
        'body' => 'lorem ipsum'        
		]);

		 Posts::create([
        'title' => 'my test',
        'body' => 'my test'      
		]);

		
    }
}
