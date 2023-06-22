<?php

use App\Events\UserCreated;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i<= 2 ; $i ++)
        {
            $user = new User();
            $user->name = "user_".$i;
            $user->email = "user_".$i."@gmail.com";
            $user->password = '$2y$10$QNlcNHOV.PvQKM1JUBb6RuUuXAEQKh8xWZLeXpe.M8eCg8/K3MlU.';
            $user->save();
        }
    }
}
