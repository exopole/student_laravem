<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$upload = public_path('avatars');
    	$files = File::allFiles($upload);

    	foreach ($files as $file) {
    		File::delete($file);
    	}

        factory(App\Student::class, 10)->create()->each(function ($student) use ($upload){
        	$filename = file_get_contents('http://lorempicsum.com/futurama/350/200/'.rand(1,9));
        	$uri = str_random(30) . '.jpg'; 

        	File::put($upload.'/'.$uri, $filename);
        	$student->avatar()->create(['uri' => $uri, 'name' => $student->name]);
        });

    }
}
