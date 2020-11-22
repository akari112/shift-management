<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //デモユーザー10件
        factory(App\User::class, 10)->create();

        // 管理者
        factory(App\Admin::class)->create(
            ['username' => 'akari', 'password' => bcrypt('akari')]
        );
        // ユーザーにメッセージを登録
        App\User::all()->each(function ($user) {
            factory(App\Message::class,$user->id % 4)->create(['user_id' => $user->id]);
        });
    }
}
