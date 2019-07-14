<?php

use Illuminate\Database\Seeder;
use App\Models\ArticleCategory;
use Carbon\Carbon;

class ArticleCategoriesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_categories')->truncate();

        $data = [
            [
                'name' => 'BeritaBaik',
                'status' => 1,
                'instagram_access_token_1' => null,
                'instagram_access_token_2' => null,
                'instagram_access_token_3' => null,
                'created_by' => 1,
                'created_at' => Carbon::now()

            ],
            [
                'name' => 'InfoKampus',
                'status' => 1,
                'instagram_access_token_1' => '4302286755.1677ed0.5c2e5e61c3d84efa9ee8920ac2b1cc89',
                'instagram_access_token_2' => '5427535868.1677ed0.b5435eed4d624002aa696941ae678c76',
                'instagram_access_token_3' => null,
                'created_by' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'RuangKota',
                'status' => 1,
                'instagram_access_token_1' => '2512571853.1677ed0.e01dd7ec0f4047f38475552924875c23',
                'instagram_access_token_2' => '5326334945.1677ed0.f47f75244a4e4715a7bfca086f80f9c1',
                'instagram_access_token_3' => null,
                'created_by' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Podcast',
                'status' => 1,
                'instagram_access_token_1' => '2160507790.1677ed0.3b66615cbb6843f28b6d741fdecf1961',
                'instagram_access_token_2' => null,
                'instagram_access_token_3' => null,
                'created_by' => 1,
                'created_at' => Carbon::now()

            ],
            [
                'name' => 'Event',
                'status' => 1,
                'instagram_access_token_1' => null,
                'instagram_access_token_2' => null,
                'instagram_access_token_3' => null,
                'created_by' => 1,
                'created_at' => Carbon::now()

            ],
            [
                'name' => 'Kerjasama',
                'status' => 1,
                'instagram_access_token_1' => null,
                'instagram_access_token_2' => null,
                'instagram_access_token_3' => null,
                'created_by' => 1,
                'created_at' => Carbon::now()

            ],

        ];

        foreach ( $data as  $datas )
        {
            ArticleCategory::create($datas);
        }
    }
}
