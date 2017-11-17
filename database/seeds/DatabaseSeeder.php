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
            'profile_id' => 1
        ]);

        // ユーザoic
        DB::table('users')->insert([
            'email' => 'oicportalapp2@gmail.com',
            'name' => 'OIC USER',
            'name_kana' => 'おいしー　ユーザ',
            'authority_id' => 1,
            'profile_id' => 1
        ]);

        // ユーザ
        for ($i = 2; $i < 150; $i++) {
            DB::table('users')->insert([
                'email' => $i.$faker->email,
                'name' => $faker->name,
                'name_kana' => $faker->kanaName,
                'authority_id' => 1,
                'profile_id' => $i
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
        for ($i = 1; $i < count($authorities); $i++) {
            DB::table('authorities_master')->insert([
                'authority_name' => $authorities[$i]
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
        for ($i = 1; $i < 100; $i++) {
            DB::table('profiles_table')->insert([
                'profile_image' => '/images/profile_images/default.jpg',
                'profile_name' => $faker->name,
                'course_id' => rand(1,22),
                'profile_admission_year' => Carbon::now(),
                'profile_url' => 'http://www.oic-portal.co.jp',
                'profile_introduction' => 'Hello'
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
                'parent_course_id' => 0,
                'course_depth' => 0,
                'course_year' => 0
            ]);
        }
        $courses = ['ITスペシャリスト専攻','ネットワークセキュリティ専攻','システムエンジニア専攻','ネットワークエンジニア専攻','Webエンジニア専攻','テクニカルコース','ネットワークシステムコース','ゲームプログラマー専攻','ゲームデザイナー専攻','ゲームプランナー専攻','ゲームクリエイター専攻(PG)','ゲームクリエイター専攻(CG)','ゲームプログラムコース','ゲームCGデザインコース','CG映像クリエイター専攻','CGクリエイター専攻','CG映像コース','CGアニメーションコース','アートディレクター専攻','Webデザインコース','グラフィックデザインコース','マンガイラストコース'];
        $parents = [1,1,1,1,1,1,1,2,2,2,2,2,2,2,3,3,3,3,4,4,4,4];
        $year = [4,4,3,3,3,2,2,4,4,4,3,3,2,2,4,3,2,2,3,2,2,2];
        DB::table('courses_master')->delete();
        for ($i = 0; $i < count($courses); $i++) {
            DB::table('courses_master')->insert([
                'course_name' => $courses[$i],
                'parent_course_id' => $parents[$i],
                'course_depth' => 1,
                'course_year' => $year[$i]
            ]);
        }
    }
}

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        $articlesTitle = ['#test1','#test2','#test3','#test4','#test5','#test6','#test7','#test8','#test9','#test10'];
        $articlesText = ['#test1','#test2','#test3','#test4','#test5','#test6','#test7','#test8','#test9','#test10'];
        DB::table('articles_table')->delete();
        for ($i = 1; $i < 10; $i++) {
            DB::table('articles_table')->insert([
                'article_title' => $articlesTitle[$i],
                'article_text' => $articlesText[$i],
                'article_image' => '',
                'news_site_id' => rand(1,20)
            ]);
        }
    }
}

class ArticlesLikesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_likes_table')->delete();
        for ($i = 1; $i < 5; $i++) {
            DB::table('articles_likes_table')->insert([
                'article_id' => rand(1,10),
                'user_id' => $i
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
                'article_comment_text' => $articlesComments[$i]
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
        for ($i = 1; $i < count($reportsContents); $i++) {
            DB::table('reports_table')->insert([
                'report_category_id' => $i,
                'user_id' => $i,
                'report_contents' => $reportsContents[$i],
                'report_deal_status_id' => $i
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
                'report_deal_comment' => $reportsComments[$i]
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
                'report_risk_id' => $i
            ]);
        }
    }
}

class FriendsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('friends_table')->delete();
        for ($i = 0; $i < 5; $i++) {
            DB::table('friends_table')->insert([
                'user_id' => $i,
                'user2_id' => $i
            ]);
        }
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
                'community_category_name' => $communitiesCategories[$i]
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
                'authority_id' => rand(1,3)
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
                'user_id' => $i
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
                'community_comment_contents' => $communitiesCommentsContents[$i]
            ]);
        }
    }
}

class NewsSitesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('news_sites_master')->delete();

        // GIGAZINE
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'GIGAZINE',
            'news_site_url' => 'http://feed.rssad.jp/rss/gigazine/rss_2.0',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // TrendMicro 技術ブログ
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'TrendMicro 技術ブログ',
            'news_site_url' => 'http://feeds.trendmicro.com/TM-Securityblog/',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 速報
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 速報',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_bursts.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 国内記事
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 国内記事',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_domestic.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 海外記事
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 海外記事   ',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_foreign.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia ベンチャー
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia ベンチャー',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_venture.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 製品動向
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 製品動向',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_products.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 科学・テクノロジー
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 科学・テクノロジー',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_technology.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia ネットトピック
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia ネットトピック',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_nettopics.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 社会とIT
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 社会とIT',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_society.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia セキュリティ
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia セキュリティ',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_security.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 企業・業界動向
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia 企業・業界動向',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_industry.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // ITmedia リサーチ
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia リサーチ',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_research.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // ITmedia PR
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ITmedia PR',
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_special.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // MdN DESIGN
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'MdN DESIGN',
            'news_site_url' => 'http://rss.rssad.jp/rss/mdn/di/rss.php',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 3
        ]);

        // ファミ通APP
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'ファミ通APP',
            'news_site_url' => 'https://app.famitsu.com/feed/',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 2
        ]);

        // keizai report.com 日本経済・財政
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'keizai report.com 日本経済・財政',
            'news_site_url' => 'http://xml.keizaireport.com/rss/node_2.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // keizai report.com 経営総合
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'keizai report.com 経営総合',
            'news_site_url' => 'http://xml.keizaireport.com/rss/node_3.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // keizai report.com 金融総合
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'keizai report.com 金融総合',
            'news_site_url' => 'http://xml.keizaireport.com/rss/node_4.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // keizai report.com 産業総合
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'keizai report.com 産業総合',
            'news_site_url' => 'http://xml.keizaireport.com/rss/node_5.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // keizai report.com 海外経済・国際機関
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'keizai report.com 海外経済・国際機関',
            'news_site_url' => 'http://xml.keizaireport.com/rss/node_6.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // keizai report.com 経済見通し
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'keizai report.com 経済見通し',
            'news_site_url' => 'http://xml.keizaireport.com/rss/node_7.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // keizai report.com 地域経済・地方自治体
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'keizai report.com 地域経済・地方自治体',
            'news_site_url' => 'http://xml.keizaireport.com/rss/node_8.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // keizai report.com 環境・リサイクル
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'keizai report.com 環境・リサイクル',
            'news_site_url' => 'http://xml.keizaireport.com/rss/node_9.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // keizai report.com インターネット
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'keizai report.com インターネット',
            'news_site_url' => 'http://xml.keizaireport.com/rss/node_10.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // TOKYO DESIGN WEEK
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'TOKYO DESIGN WEEK',
            'news_site_url' => 'http://tokyodesignweek.jp/designboom/',
            'news_site_tag_title' => 'article dt',
            'news_site_tag_url' => 'article a',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 3
        ]);

        // PHOTOSHOPVIP
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'PHOTOSHOPVIP',
            'news_site_url' => 'http://photoshopvip.net/',
            'news_site_tag_title' => 'article h2 a',
            'news_site_tag_url' => 'article a',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 3
        ]);

        // scrmble
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'scrmble',
            'news_site_url' => 'http://scrmble.jp/',
            'news_site_tag_title' => 'ul h2 a', //空白
            'news_site_tag_url' => 'ul a',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // JDP
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'JDP',
            'news_site_url' => 'https://www.jidp.or.jp/news/',
            'news_site_tag_title' => 'article h1 a',
            'news_site_tag_url' => 'article h1 a',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // CGWORLD.JP
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'CGWORLD.JP',
            'news_site_url' => 'https://cgworld.jp/news/',
            'news_site_tag_title' => 'article h2',
            'news_site_tag_url' => 'article a',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 3
        ]);

        // Gamer
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'Gamer',
            'news_site_url' => 'https://www.gamer.ne.jp/news/',
            'news_site_tag_title' => 'li p a',
            'news_site_tag_url' => 'li p a',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 2
        ]);

        // 3D人
        DB::table('news_sites_master')->insert([
            'news_site_name' => '3D人',
            'news_site_url' => 'http://3dnchu.com/',
            'news_site_tag_title' => 'article h2 a',
            'news_site_tag_url' => 'article h2 a',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 3
        ]);

        // 電撃オンライン
        DB::table('news_sites_master')->insert([
            'news_site_name' => '電撃オンライン',
            'news_site_url' => 'http://dengekionline.com/',
            'news_site_tag_title' => '.artMain h3 a',
            'news_site_tag_url' => '.artMain h3 a',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 2
        ]);

        // Gamespark
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'Gamespark',
            'news_site_url' => 'https://www.gamespark.jp/',
            'news_site_tag_title' => 'section ul h3',
            'news_site_tag_url' => 'section a.link',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 2
        ]);

        // doope!
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'doope!',
            'news_site_url' => 'https://doope.jp/',
            'news_site_tag_title' => '.cont_titbox h2 a',
            'news_site_tag_url' => 'cont_titbox h2 a',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // 東洋経済オンライン
        DB::table('news_sites_master')->insert([
            'news_site_name' => '東洋経済オンライン',
            'news_site_url' => 'http://toyokeizai.net/',
            'news_site_tag_title' => 'ul .title a',
            'news_site_tag_url' => 'ul .title a',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 5
        ]);

        // GAME Watch
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'GAME Watch',
            'news_site_url' => 'https://game.watch.impress.co.jp/',
            'news_site_tag_title' => 'article .title a',
            'news_site_tag_url' => 'article .title a',
            'news_site_tag_text' => '',
            'news_site_tag_image' => '',
            'news_site_category_id' => 2
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
        for ($i = 1; $i < count($newsSitesCategories); $i++) {
            DB::table('news_sites_categories_master')->insert([
                'news_site_category_name' => $newsSitesCategories[$i]
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
                'event_start_date_time' => Carbon::now(),
                'event_end_date_time' => Carbon::now(),
                'event_maker_id' => rand(1,$makermax)
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
                'event_authority_id' => rand(1,$authoritymax)
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
                'report_risk_deal_status_name' => $reportsRisksDealStatus[$i]
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
                'report_risk_num' => $i
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
                'event_authority_name' => $eventsAuthorities[$i]
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
                'chat_text' => $chatTexts[$i]
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
                'inquiry_text' => $inquiriesTexts[$i]
            ]);
        }
    }
}

class ArticlesExclusionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_exclusion')->delete();
        DB::table('articles_exclusion')->insert([
           'exclusion_string' => '\n'
        ]);
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