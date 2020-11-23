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
        // デモユーザー12件
        factory(App\User::class, 12)->create();
        
        // シフト前後2ヶ月200件
        App\User::all()->each(function ($user) {
            factory(App\Shift::class, 200)->create(['user_id' => $user->id]);
        });

        // 管理者
        factory(App\Admin::class)->create(
            ['username' => 'akari', 'password' => bcrypt('akari')]
        );
        // ユーザーにメッセージを登録
        App\User::all()->each(function ($user) {
            factory(App\Message::class,$user->id % 30)->create(['user_id' => $user->id]);
        });
    }
}
