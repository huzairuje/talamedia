<?php

use Illuminate\Database\Seeder;
use App\Models\ArticleTag;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArticleTagsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_tags')->truncate();

        $data = [
            [
                'name' => 'Berita Baik',
                'status' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()

            ],
            [
                'name' => 'Info Kampus',
                'status' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Ruang Kota',
                'status' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Podcast',
                'status' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()

            ],
            [
                'name' => 'Event',
                'status' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()

            ],
            [
                'name' => 'Kerjasama',
                'status' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()

            ],
            [
                'name' => 'Start Up',
                'status' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()

            ],

        ];

        foreach ( $data as  $datas )
        {
            ArticleTag::create($datas);
        }
    }
}
