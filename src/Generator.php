<?php

namespace App;

// class Generator
// {
//     public static function generate($count)
//     {
//         $faker = \Faker\Factory::create();
//         $faker->seed(1);
//         $companies = [];
//         for ($i = 0; $i < $count; $i++) {
//             $companies[] = [
//                 'name' => $faker->company,
//                 'phone' => $faker->phoneNumber
//             ];
//         }

//         return $companies;
//     }
// }

class Generator
{
    public static function generate($count)
    {
        $faker = \Faker\Factory::create();
        $faker->seed(1);
        $users = [];
        for ($i = 0; $i < $count; $i++) {
            $users[] = [
                'id' => $i + 1,
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'email' => $faker->email
            ];
        }

        return $users;
    }
}