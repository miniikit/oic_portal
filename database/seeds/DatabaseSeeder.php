<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

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

        Model::reguard();
    }
}

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        //test data
        /*
        User::create([
            'email' => 'b5163@oic.jp',
            'name' => '山田　太郎',
            'name_kana' => 'ヤマダ　タロウ'
        ]);
        */
    }
}

class AuthoritiesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('authorities_master')->delete();


        //test data
        /*
        Authority::create([
            'authority_name' => 'アクセス権'
        ]);
        */
    }
}

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profiles_table')->delete();

        //test data
        /*
        profile::create([
            'profile_image' => '',
            'profile_name' => 'テスト'
        ]);
        */
    }
}

class CoursesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses_master')->delete();

        //test data
        /*
        course::create([
           'course_name' => '総合情報メディア学科',
           'course_depth' => '2'
        ]);
        */
    }
}

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_table')->delete();

        //test data
        /*
        article::create([
           'article_title' => '新発売',
           'article_text' => '〜〜〜〜〜〜〜〜〜〜、〜〜〜〜。',
           'article_image' => ''
        ]);
        */
    }
}

class ArticlesLikesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_likes_table')->delete();

        //test data
    }
}

class ArticlesCommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_comments_table')->delete();

        //test data
        /*
        article_coment::creste([
           'article_comment_text' => '〜〜〜〜〜〜〜〜〜、〜〜〜〜〜〜〜〜。'
        ]);
        */
    }
}

class ReportsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_table')->delete();

        //test data
        /*
        report::create([
           'report_contents' => '〜〜〜〜〜〜〜〜〜、〜〜〜〜〜〜〜〜。'
        ]);
        */
    }
}

class ReportsDealsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_deals_table')->delete();

        //test data
        /*
        report_deal::create([
           'report_deal_comment' => '〜〜〜〜〜〜〜〜〜、〜〜〜〜〜〜〜〜。'
        ]);
        */
    }
}

class ReportsCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_categories_master')->delete();

        //test data
    }
}

class FriendsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('friends_table')->delete();

        //test data
    }
}

class CommunitiesCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_categories_master')->delete();

        //test data
        community_category::create([
           'community_category_name' => 'スポーツ'
        ]);
    }
}

class CommunitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_table')->delete();

        //test data
        community::create([
           'community_title' => 'コミュニティA',
           'community_contents' => 'フットボール部です'
        ]);
    }
}

class CommunitiesParticipantsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_participants_table')->delete();

        //test data

    }
}

class CommunitiesCommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_comments_table')->delete();

        //test data
    }
}

class NewsSitesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('news_sites_master')->delete();

        //test data
        /*
        news_site::creat([
           'news_site_url' => 'http~~~~',
           'news_site_tag_title' => '',
           'news_site_tag_article' => '',
           'news_site_tag_image' => ''
        ]);
        */
    }
}

class NewsSitesCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('news_categories_master')->delete();

        //test data
    }
}

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events_table')->delete();

        //test data
        event::create([
           'event_title' => 'php勉強会'
        ]);
    }
}

class EventsParticipantsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events_participants_table')->delete();

        //test data
    }
}

class ReportsRisksDealStatusMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_risks_deal_status_master')->delete();

        //test data
    }
}

class ReportsRisksCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_risks_categories_master')->delete();

        //test data
    }
}

class EventsAuthoritiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events_authorities_table')->delete();

        //test data

    }
}