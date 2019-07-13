<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class ArticleCategoriesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $data = [
            [
                'name' => 'Info Kampus',
                'status' => 1,
                'instagram_access_token_1' => '5427535868.1677ed0.b5435eed4d624002aa696941ae678c76',
                'instagram_access_token_2' => '4302286755.1677ed0.5c2e5e61c3d84efa9ee8920ac2b1cc89',
                'instagram_access_token_3' => null,
            ],
            [
                'name' => 'WFI',
                'status' => 1,
                'instagram_access_token_1' => '4047701143.1677ed0.54a9c2bcadd048b2ab1e92c4492074d8',
                'instagram_access_token_2' => null,
                'instagram_access_token_3' => null
            ],
            [
                'name' => 'Ruang Kota',
                'status' => 1,
                'instagram_access_token_1' => '2512571853.1677ed0.e01dd7ec0f4047f38475552924875c23',
                'instagram_access_token_2' => '5326334945.1677ed0.f47f75244a4e4715a7bfca086f80f9c1',
                'instagram_access_token_3' => null
            ],
            [
                'name' => 'Berita Baik',
                'status' => '1',
                'instagram_access_token_1' => null,
                'instagram_access_token_2' => null,
                'instagram_access_token_3' => null

            ],
            [
                'name' => 'Podcast',
                'status' => '1',
                'instagram_access_token_1' => null,
                'instagram_access_token_2' => null,
                'instagram_access_token_3' => null

            ],
            [
                'name' => 'Event',
                'status' => '1',
                'instagram_access_token_1' => null,
                'instagram_access_token_2' => null,
                'instagram_access_token_3' => null

            ],
            [
                'name' => 'Gigs',
                'status' => '1',
                'instagram_access_token_1' => null,
                'instagram_access_token_2' => null,
                'instagram_access_token_3' => null

            ],
            [
                'name' => 'Videos',
                'status' => '1',
                'instagram_access_token_1' => null,
                'instagram_access_token_2' => null,
                'instagram_access_token_3' => null

            ],

        ];

        foreach ( $data as  $datas )
        {
            ArticleCategory::create($datas);
        }
    }
}
