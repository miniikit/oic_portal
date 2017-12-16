<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UsersSeeder');
        $this->call('AuthoritiesMasterSeeder');
        $this->call('ProfilesTableSeeder');
        $this->call('CoursesMasterSeeder');
        $this->call('ArticlesTableSeeder');
        $this->call('ArticlesLikesTableSeeder');
        $this->call('ArticlesCommentsTableSeeder');
        $this->call('ReportsTableSeeder');
        $this->call('ReportsDealsTableSeeder');
        $this->call('ReportsCategoriesMasterSeeder');
        $this->call('FriendsTableSeeder');
        $this->call('CommunitiesCategoriesMasterSeeder');
        $this->call('CommunitiesTableSeeder');
        $this->call('CommunitiesParticipantsTableSeeder');
        $this->call('CommunitiesCommentsTableSeeder');
        $this->call('NewsSitesMasterSeeder');
        $this->call('NewsSitesCategoriesMasterSeeder');
        $this->call('EventsTableSeeder');
        $this->call('EventsParticipantsTableSeeder');
        $this->call('ReportsRisksDealStatusMasterSeeder');
        $this->call('ReportsRisksCategoriesMasterSeeder');
        $this->call('EventsAuthoritiesTableSeeder');
        $this->call('ChatsTableSeeder');
        $this->call('InquiriesTableSeeder');
        $this->call('ArticlesExclusionTableSeeder');
        $this->call('CreateCrawlerStatusCategoriesMasterSeeder');
        $this->call('CrawlerScheduleTableSeeder');
        //$this->call('MessagesTableSeeder');

        Model::reguard();
    }
}

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $faker = Faker::create('ja_JP');

        // 管理者
        DB::table('users')->insert([
            'email' => 'oicportalapp@gmail.com',
            'name' => 'オイシー太郎',
            'name_kana' => 'オイシータロウ',
            'authority_id' => 3,
            'profile_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //サブ管理者
        DB::table('users')->insert([
            'email' => 'B5502@oic.jp',
            'name' => 'オイシー花子',
            'name_kana' => 'オイシーハナコ',
            'authority_id' => 2,
            'profile_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ユーザ
        for ($i = 100; $i < 250; $i++) {
            $email = 'B' . rand(1,9) . $i . '@oic.jp';
            DB::table('users')->insert([
                'email' => $email,
                'name' => $faker->name,
                'name_kana' => $faker->kanaName,
                'authority_id' => 1,
                'profile_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class AuthoritiesMasterSeeder extends Seeder
{
    public function run()
    {
        $authorities = ['一般','サブ管理者','管理者'];
        DB::table('authorities_master')->delete();
        for ($i = 0; $i < count($authorities); $i++) {
            DB::table('authorities_master')->insert([
                'authority_name' => $authorities[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('ja_JP');

        DB::table('profiles_table')->delete();

        // 管理者 タロウ
        DB::table('profiles_table')->insert([
            'profile_image' => '/images/profile_images/default.jpg',
            'profile_name' => 'タロウ',
            'course_id' => rand(1,22),
            'profile_admission_year' => '2014-04-01 00:00:00',
            'profile_url' => 'http://www.oic-portal.co.jp',
            'profile_introduction' => 'Hello',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //　サブ管理者　ハナコ
        DB::table('profiles_table')->insert([
            'profile_image' => '/images/profile_images/default.jpg',
            'profile_name' => 'ハナコ',
            'course_id' => rand(1,22),
            'profile_admission_year' => '2014-04-01 00:00:00',
            'profile_url' => 'http://www.oic-portal.co.jp',
            'profile_introduction' => 'Hello',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $nowYear = Carbon::now()->year;
        $baseYear = $nowYear - 4;
        for ($i = 3; $i < 150; $i++) {
            $year = rand($baseYear,$nowYear);
            $month = rand(1,12);
            $day = rand(1,30);

            $incorporation = false;

            // 在学中の学生を生成
            $date = Carbon::create($year,4,1,9,0,0);

            // 編入学生徒を生成
            if($i % 30 === 0){
                $date = Carbon::create($year , $month , $day,9,0,0);
            }

            DB::table('profiles_table')->insert([
                'profile_image' => '/images/profile_images/default.jpg',
                'profile_name' => $faker->name,
                'course_id' => rand(1,22),
                'profile_admission_year' => $date,
                'profile_url' => 'http://www.oic-portal.co.jp',
                'profile_introduction' => 'Hello',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class CoursesMasterSeeder extends Seeder
{
    public function run()
    {
        $parentCourses = ['情報処理IT','ゲーム','CG・映像・アニメーション','デザイン・Web'];
        DB::table('courses_master')->delete();
        for ($i = 0; $i < count($parentCourses); $i++) {
            DB::table('courses_master')->insert([
                'course_name' => $parentCourses[$i],
                'parent_course_id' => 3,
                'course_depth' => 0,
                'course_year' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        $courses = ['ITスペシャリスト専攻','ネットワークセキュリティ専攻','システムエンジニア専攻','ネットワークエンジニア専攻','Webエンジニア専攻','テクニカルコース','ネットワークシステムコース','ゲームプログラマー専攻','ゲームデザイナー専攻','ゲームプランナー専攻','ゲームクリエイター専攻(PG)','ゲームクリエイター専攻(CG)','ゲームプログラムコース','ゲームCGデザインコース','CG映像クリエイター専攻','CGクリエイター専攻','CG映像コース','CGアニメーションコース','アートディレクター専攻','Webデザインコース','グラフィックデザインコース','マンガイラストコース'];
        $parents = [1,1,1,1,1,1,1,2,2,2,2,2,2,2,3,3,3,3,4,4,4,4];
        $year = [4,4,3,3,3,2,2,4,4,4,3,3,2,2,4,3,2,2,3,2,2,2];
        for ($i = 0; $i < count($courses); $i++) {
            DB::table('courses_master')->insert([
                'course_name' => $courses[$i],
                'parent_course_id' => $parents[$i],
                'course_depth' => 1,
                'course_year' => $year[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_table')->delete();
        for ($i = 1; $i < 100; $i++) {
            DB::table('articles_table')->insert([
                'article_title' => '#test'.$i,
                'article_text' => '#test'.$i,
                'article_image' => '/images/sample-' . rand(1,6) . '.jpg',
                'article_url' => 'http://gigazine.net/news/20171128-macbook-egpu-rx-vega-64/',
                //'article_url' => '/articles/' . $i,
                'news_site_id' => rand(1,20),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ArticlesLikesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_likes_table')->delete();
        for ($i = 1; $i < 500; $i++) {
            DB::table('articles_likes_table')->insert([
                'article_id' => rand(1,50),
                'user_id' => rand(1,100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ArticlesCommentsTableSeeder extends Seeder
{
    public function run()
    {
        $articlesComments = ['good','like','Hello'];
        DB::table('articles_comments_table')->delete();
        for ($i = 1; $i < count($articlesComments); $i++) {
            DB::table('articles_comments_table')->insert([
                'article_id' => $i,
                'user_id' => $i,
                'article_comment_text' => $articlesComments[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ReportsTableSeeder extends Seeder
{
    public function run()
    {
        $reportsContents = ['不適切な内容です','誹謗中傷されました','規約違反しています'];
        DB::table('reports_table')->delete();
        for ($i = 0; $i < 50; $i++) {
            DB::table('reports_table')->insert([
                'report_category_id' => rand(0,2),
                'user_id' => rand(1,150),
                'report_contents' => $reportsContents[rand(0,2)],
                'report_deal_status_id' => rand(1,3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ReportsDealsTableSeeder extends Seeder
{
    public function run()
    {
        $reportsComments = ['対処しました','対処済み','対処できません'];
        DB::table('reports_deals_table')->delete();
        for ($i = 0; $i < count($reportsComments); $i++) {
            DB::table('reports_deals_table')->insert([
                'report_id' => $i,
                'user_id' => $i,
                'report_deal_comment' => $reportsComments[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ReportsCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $reportCategories = ['不適切','誹謗中傷','規約違反','その他'];
        DB::table('reports_categories_master')->delete();
        for ($i = 0; $i < count($reportCategories); $i++) {
            DB::table('reports_categories_master')->insert([
                'report_category_name' => $reportCategories[$i],
                'report_risk_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class FriendsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('friends_table')->delete();

        /*
        for ($i = 0; $i < 100; $i++) {
            DB::table('friends_table')->insert([
                'user_id' => rand(1,10),
                'user2_id' => rand(1,100)
            ]);
        }

        for ($i = 0; $i < 300; $i++) {
            DB::table('friends_table')->insert([
                'user_id' => rand(1,100),
                'user2_id' => rand(1,100)
            ]);
        }
        */
        DB::table('friends_table')->insert([
            'user_id' => 1,
            'user2_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('friends_table')->insert([
            'user_id' => 1,
            'user2_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('friends_table')->insert([
            'user_id' => 1,
            'user2_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('friends_table')->insert([
            'user_id' => 1,
            'user2_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);



    }
}

class CommunitiesCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $communitiesCategories = ['趣味','スポーツ',''];
        DB::table('communities_categories_master')->delete();
        for ($i = 1; $i < count($communitiesCategories); $i++) {
            DB::table('communities_categories_master')->insert([
                'community_category_name' => $communitiesCategories[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class CommunitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_table')->delete();
        for ($i = 1; $i < 50; $i++) {
            DB::table('communities_table')->insert([
                'community_title' => '#test'.$i,
                'community_contents' => '#test'.$i,
                'authority_id' => rand(1,3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class CommunitiesParticipantsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_participants_table')->delete();
        for ($i = 0; $i < 5; $i++) {
            DB::table('communities_participants_table')->insert([
                'community_id' => $i,
                'user_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class CommunitiesCommentsTableSeeder extends Seeder
{
    public function run()
    {
        $communitiesCommentsContents = ['Hello','welcome','goodnight'];
        DB::table('communities_comments_table')->delete();
        for ($i = 0; $i < count($communitiesCommentsContents); $i++) {
            DB::table('communities_comments_table')->insert([
                'community_id' => $i,
                'user_id' => $i,
                'community_comment_contents' => $communitiesCommentsContents[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class NewsSitesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('news_sites_master')->delete();

        //ユーザ記事
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'User',
            'news_site_url' => 'User',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.cntimage p',
            'news_site_tag_image' => '.cntimage img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // GIGAZINE
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'GIGAZINE',
            'news_site_url' => 'http://feed.rssad.jp/rss/gigazine/rss_2.0',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.cntimage p',
            'news_site_tag_image' => '.cntimage img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // TrendMicro 技術ブログ
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'TrendMicro 技術ブログ',
            'news_site_url' => 'http://feeds.trendmicro.com/TM-Securityblog/',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.post-text p',
            'news_site_tag_image' => '.post-text img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia 速報
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 速報',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_bursts.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia 国内記事
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 国内記事',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_domestic.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia 海外記事
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 海外記事   ',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_foreign.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia ベンチャー
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia ベンチャー',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_venture.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia 製品動向
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 製品動向',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_products.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia 科学・テクノロジー
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 科学・テクノロジー',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_technology.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia ネットトピック
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia ネットトピック',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_nettopics.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia 社会とIT
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 社会とIT',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_society.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia セキュリティ
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia セキュリティ',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_security.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia 企業・業界動向
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 企業・業界動向',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_industry.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia リサーチ
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia リサーチ',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_research.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ITmedia PR
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia PR',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_special.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.inner p',
            'news_site_tag_image' => '.inner img',
            'news_site_category_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // MdN DESIGN
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'MdN DESIGN',
            'news_site_url' => 'http://rss.rssad.jp/rss/mdn/di/rss.php',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.box-text',
            'news_site_tag_image' => '.text img',
            'news_site_category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ファミ通APP
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ファミ通APP',
            'news_site_url' => 'https://app.famitsu.com/feed/',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '#entry-body p',
            'news_site_tag_image' => '#entry-body td img',
            'news_site_category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // TOKYO DESIGN WEEK
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'TOKYO DESIGN WEEK',
            'news_site_url' => 'http://tokyodesignweek.jp/designboom/',
            'news_site_tag_title' => 'article dt',
            'news_site_tag_url' => 'article a',
            'news_site_tag_text' => '.contents .w820 p',
            'news_site_tag_image' => '.contents .w820 p img',
            'news_site_category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // PHOTOSHOPVIP
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'PHOTOSHOPVIP',
            'news_site_url' => 'http://photoshopvip.net/',
            'news_site_tag_title' => 'article h2 a',
            'news_site_tag_url' => 'article a',
            'news_site_tag_text' => 'span p',
            'news_site_tag_image' => '.cb-entry-header .cb-mask img',
            'news_site_category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // JDP
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'JDP',
            'news_site_url' => 'https://www.jidp.or.jp/news/',
            'news_site_tag_title' => 'article h1 a',
            'news_site_tag_url' => 'article h1 a',
            'news_site_tag_text' => 'article p',
            'news_site_tag_image' => 'article img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // CGWORLD.JP
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'CGWORLD.JP',
            'news_site_url' => 'https://cgworld.jp/news/',
            'news_site_tag_title' => 'article h2',
            'news_site_tag_url' => 'article a',
            'news_site_tag_text' => '.article-body p',
            'news_site_tag_image' => '.article-thum img',
            'news_site_category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Gamer
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'Gamer',
            'news_site_url' => 'https://www.gamer.ne.jp/news/',
            'news_site_tag_title' => 'li p a',
            'news_site_tag_url' => 'li p a',
            'news_site_tag_text' => 'article .box p',
            'news_site_tag_image' => 'article .box a img',
            'news_site_category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 3D人
        DB::table('news_sites_master')->insert([
            'news_site_name' => '3D人',
            'news_site_url' => 'http://3dnchu.com/',
            'news_site_tag_title' => 'article h2 a',
            'news_site_tag_url' => 'article h2 a',
            'news_site_tag_text' => 'article p',
            'news_site_tag_image' => 'article img',
            'news_site_category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 電撃オンライン
        DB::table('news_sites_master')->insert([
            'news_site_name' => '電撃オンライン',
            'news_site_url' => 'http://dengekionline.com/',
            'news_site_tag_title' => '.artMain h3 a',
            'news_site_tag_url' => '.artMain h3 a',
            'news_site_tag_text' => 'article section p',
            'news_site_tag_image' => '',
            'news_site_category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Gamespark
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'Gamespark',
            'news_site_url' => 'https://www.gamespark.jp/',
            'news_site_tag_title' => 'section ul h3',
            'news_site_tag_url' => 'section a.link',
            'news_site_tag_text' => 'main article',
            'news_site_tag_image' => '', //画像なし
            'news_site_category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // doope!
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'doope!',
            'news_site_url' => 'https://doope.jp/',
            'news_site_tag_title' => '.cont_titbox h2 a',
            'news_site_tag_url' => 'cont_titbox h2 a',
            'news_site_tag_text' => '.cont_article p',
            'news_site_tag_image' => '.cont_article img',
            'news_site_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 東洋経済オンライン
        DB::table('news_sites_master')->insert([
            'news_site_name' => '東洋経済オンライン',
            'news_site_url' => 'http://toyokeizai.net/',
            'news_site_tag_title' => 'ul .title a',
            'news_site_tag_url' => 'ul .title a',
            'news_site_tag_text' => '.life p',
            'news_site_tag_image' => '.life img',
            'news_site_category_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // GAME Watch
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'GAME Watch',
            'news_site_url' => 'https://game.watch.impress.co.jp/',
            'news_site_tag_title' => 'article .title a',
            'news_site_tag_url' => 'article .title a',
            'news_site_tag_text' => 'article',
            'news_site_tag_image' => 'article img',
            'news_site_category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // a
        /*
        DB::table('news_sites_master')->insert([
            'news_site_url' => '',
            'news_site_tag_title' => '',
            'news_site_tag_url' => '',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);
        */
    }

}

class NewsSitesCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $newsSitesCategories = ['IT','ゲーム','デザイン','アート','経済'];
        DB::table('news_sites_categories_master')->delete();
        for ($i = 0; $i < count($newsSitesCategories); $i++) {
            DB::table('news_sites_categories_master')->insert([
                'news_site_category_name' => $newsSitesCategories[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        $makermax = 5;

        $eventTitle = ['#test1','#test2','#test3','#test4','#test5','#test6','#test7','#test8','#test9','#test10'];
        $eventTexts = ['#test1','#test2','#test3','#test4','#test5','#test6','#test7','#test8','#test9','#test10'];
        DB::table('events_table')->delete();
        for ($i = 1; $i < 10; $i++) {
            DB::table('events_table')->insert([
                'event_title' => $eventTitle[$i],
                'event_text' => $eventTexts[$i],
                'event_image' => '/images/sample-' . rand(1,6) . '.jpg',
                'event_start_date_time' => Carbon::now(),
                'event_end_date_time' => Carbon::now(),
                'event_capacity' => rand(10,500),
                'event_maker_id' => rand(1,$makermax),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class EventsParticipantsTableSeeder extends Seeder
{
    public function run()
    {
        $max = 10;
        $usermax = 50;
        $authoritymax = 3;

        DB::table('events_participants_table')->delete();
        for ($i = 1; $i < 50; $i++) {
            DB::table('events_participants_table')->insert([
                'event_id' => rand(1,$max),
                'event_user_id' => rand(1,$usermax),
                'event_authority_id' => rand(1,$authoritymax),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ReportsRisksDealStatusMasterSeeder extends Seeder
{
    public function run()
    {
        $reportsRisksDealStatus = ['未対処', '対処中', '対処済'];
        DB::table('reports_risks_deal_status_master')->delete();
        for ($i = 1; $i < count($reportsRisksDealStatus); $i++) {
            DB::table('reports_risks_deal_status_master')->insert([
                'report_risk_deal_status_name' => $reportsRisksDealStatus[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ReportsRisksCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $reportsRisksCategories = ['ちょっと危険', '危険', 'かなり危険'];
        DB::table('reports_risks_categories_master')->delete();
        for ($i = 1; $i < count($reportsRisksCategories); $i++) {
            DB::table('reports_risks_categories_master')->insert([
                'report_risk_category_name' => $reportsRisksCategories[$i],
                'report_risk_num' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class EventsAuthoritiesTableSeeder extends Seeder
{
    public function run()
    {
        $eventsAuthorities = ['管理者','ユーザ'];
        DB::table('events_authorities_table')->delete();
        for ($i = 1; $i < count($eventsAuthorities); $i++) {
            DB::table('events_authorities_table')->insert([
                'event_authority_name' => $eventsAuthorities[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ChatsTableSeeder extends Seeder
{
    public function run()
    {
        $usermax = 5;
        $user2max = 5;

        $chatTexts = ['hello', 'goodnight','sleepy','hello', 'goodnight','sleepy','hello', 'goodnight','sleepy','hello', 'goodnight','sleepy','hello', 'goodnight','sleepy'];
        DB::table('chats_table')->delete();
        for ($i = 1; $i < count($chatTexts); $i++) {
            DB::table('chats_table')->insert([
                'chat_user_id' => rand(1,$usermax),
                'chat_user2_id' => rand(1,$user2max),
                'chat_text' => $chatTexts[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class InquiriesTableSeeder extends Seeder
{
    public function run()
    {
        $inquiriesTexts = ['質問です', 'パスワード紛失しました'];
        DB::table('inquiries_table')->delete();
        for ($i = 1; $i < count($inquiriesTexts); $i++) {
            DB::table('inquiries_table')->insert([
                'inquiry_text' => $inquiriesTexts[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ArticlesExclusionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_exclusion_table')->delete();
        DB::table('articles_exclusion_table')->insert([
           'exclusion_string' => '\n',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

class CreateCrawlerStatusCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $categories = ["予約","実行中","実行完了","キャンセル"];
        DB::table('crawler_status_master')->delete();
        foreach($categories as $category) {
            DB::table('crawler_status_master')->insert([
                'crawler_status' => $category,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class CrawlerScheduleTableSeeder extends Seeder
{
    public function run()
    {
        $max = 20;
        $baseDate = Carbon::now()->subDay($max);
        $count = -1;

        $user = 0;

        DB::table('crawler_schedule_table')->delete();
        for($i=0; $i<$max; $i++) {
            $date = $baseDate;
            $date = $date->addDay(++$count);
            $endDate = $date;
            $endDate = $endDate->addHour();

            // 時々ユーザが実行したことに
            if($i % 4 === 0){
                $user = rand(1,50);
            }

            $crawlerStatus = rand(1,4);

            DB::table('crawler_schedule_table')->insert([
                'crawl_start_time' => $date,
                'crawl_end_time' => $endDate,
                'crawl_status_id' => $crawlerStatus,
                'added_articles_count' => '31',
                'user_id' => $user,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}


/*
class MessagesTableSeeder extends Seeder
{
    public function  run()
    {
        DB::table('messages_table')->delete();
        DB::table('messages_table')->insert([
           'message' => '',
           'user_id' => 1
        ]);
    }
}
*/