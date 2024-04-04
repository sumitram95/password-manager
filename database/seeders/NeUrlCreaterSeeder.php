<?php

namespace Database\Seeders;

use App\Models\UsersPasswordManangers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class NeUrlCreaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsersPasswordManangers::create([
            'user_id' => 1,
            'urls' => "https://www.xarahyl.cm",
            'username' => "jkdj",
            'password' => Crypt::encrypt("dafjl"),
            'notes' => "fjk",
            'visibility'=>"public",
        ]);
        UsersPasswordManangers::create([
            'user_id' => 1,
            'urls' => "https://www.xarahyl.cjdkdkjkaslm",
            'username' => "jkdj",
            'password' => Crypt::encrypt("dafjl"),
            'notes' => "fjk",
            'visibility'=>"public",
        ]);
        UsersPasswordManangers::create([
            'user_id' => 1,
            'urls' => "https://www.xarahyl.cm",
            'username' => "jkdj",
            'password' => Crypt::encrypt("dafjl"),
            'notes' => "fjk",
            'visibility'=>"private",

        ]);
        UsersPasswordManangers::create([
            'user_id' => 1,
            'urls' => "https://www.xarahyl.cm",
            'username' => "jkdj",
            'password' => Crypt::encrypt("dafjl"),
            'notes' => "fjk",
            'visibility'=>"public",
        ]);
    }
}
