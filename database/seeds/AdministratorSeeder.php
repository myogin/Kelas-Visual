<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $administrator = new \App\User;
        $administrator->name = "yogi";
        $administrator->email = "yogi@gmail.com";
        $administrator->password = \Hash::make("yogi");
        $administrator->role = "admin";
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
