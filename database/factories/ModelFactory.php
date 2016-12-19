<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'address' => $faker->address,
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $title = $faker->text(10);
    return [
        'category_id' => (rand(1,3)==1)? rand(1,2) : NULL,
        'user_id' => (rand(1,0)==1)? rand(1,10) : NULL,
        'title' => $title,
        'slug' => str_slug($title),
        'content' => $faker->paragraph(rand(2,5)),
        'author' => $faker->name,
        'publish_at' =>$faker->dateTime,
        'status' => (rand(0,1))? 'published' : (rand(0,1))? 'unpublished' : 'draft',
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});


