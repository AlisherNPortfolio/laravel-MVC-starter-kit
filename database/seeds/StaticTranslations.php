<?php

use App\Classes\StaticTranslation;
use Illuminate\Database\Seeder;

class StaticTranslations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $translations = [
            [
                'key' => 'my_profile',
                'value' => [
                    'en' => 'My profile',
                    'ru' => 'Мой профайл',
                    'uz' => 'Mening profilim'
                ]
            ],
            [
                'key' => 'logout',
                'value' => [
                    'en' => 'Logout',
                    'ru' => 'Мой профайл',
                    'uz' => 'Mening profilim'
                ]
            ],
        ];

        foreach ($translations as $translation) {
            StaticTranslation::query()->create($translation);
        }
    }
}
