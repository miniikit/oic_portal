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
        DB::table('users')->insert([
            'email' => 'b9999@oic.jp',
            'name' => '山田太郎',
            'name_kana' => 'ヤマダタロウ',
            'authority_id' => 1,
            'course_id' => 1,
            'profile_id' => 1
        ]);
        /*
        //test data
        User::create([
            'email' => 'b9999@oic.jp',
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
        DB::table('authorities_master')->insert([
            'authority_name' => '〜〜権',
        ]);
        //test data
    }
}

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profiles_table')->delete();
        DB::table('profiles_table')->insert([
            'profile_image' => '',
            'profile_name' => 'ホゲ',
            'course_id' => 1
        ]);
        //test data
    }
}

class CoursesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses_master')->delete();
        DB::table('courses_master')->insert([
            'course_name' => '総合情報メディア',
            'parent_course_id' => 1,
            'course_depth' => 1
        ]);
        //test data
    }
}

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_table')->delete();
        DB::table('articles_table')->insert([
            'article_title' => 'あああ',
            'article_text' => 'あいうえおあいうえおあいうえお',
            'article_image' => '',
            'news_site_id' => 1
        ]);
        //test data
    }
}

class ArticlesLikesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_likes_table')->delete();
        DB::table('articles_likes_table')->insert([
            'article_id' => 1,
            'user_id' => 1
        ]);
        //test data
    }
}

class ArticlesCommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_comments_table')->delete();
        DB::table('articles_comments_table')->insert([
            'article_id' => 1,
            'user_id' => 1,
            'article_comment_text' => 'あああああああ'
        ]);
        //test data
    }
}

class ReportsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_table')->delete();
        DB::table('reports_table')->insert([
            'report_category_id' => 1,
            'user_id' => 1,
            'report_contents' => 'あああああいいいいいいうううううえお',
            'report_deal_status_id' =>1
        ]);
        //test data
    }
}

class ReportsDealsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_deals_table')->delete();
        DB::table('reports_deals_table')->insert([
            'report_id' => 1,
            'user_id' => 1,
            'report_deal_comment' => 'ああああいいいいうううええお'
        ]);
        //test data
    }
}

class ReportsCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_categories_master')->delete();
        DB::table('reports_categories_master')->insert([
            'report_category_name' => 'ああああ',
            'report_risk_id' => 1
        ]);
        //test data
    }
}

class FriendsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('friends_table')->delete();
        DB::table('friends_table')->insert([
            'user_id' => 1,
            'user2_id' => 1
        ]);
        //test data
    }
}

class CommunitiesCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_categories_master')->delete();
        DB::table('communities_categories_master')->insert([
            'community_category_name' => '趣味'
        ]);
        //test data
    }
}

class CommunitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_table')->delete();
        DB::table('communities_table')->insert([
            'community_title' => '〜〜会',
            'community_contents' => 'あああああ',
            'authority_id' => 1
        ]);
        //test data
    }
}

class CommunitiesParticipantsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_participants_table')->delete();
        DB::table('communities_participants_table')->insert([
            'community_id' => 1,
            'user_id' => 1
        ]);
        //test data
    }
}

class CommunitiesCommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_comments_table')->delete();
        DB::table('communities_comments_table')->insert([
            'community_id' => 1,
            'user_id' => 1,
            'community_comment_contents' => 'ああああいいいいうううう'
        ]);
        //test data
    }
}

class NewsSitesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('news_sites_master')->delete();
        DB::table('news_sites_master')->insert([
            'news_site_url' => '',
            'news_site_tag_title' => 'ITメディア',
            'news_site_tag_article' => 'ああああ',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);
        //test data
    }
}

class NewsSitesCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('news_sites_categories_master')->delete();
        DB::table('news_sites_categories_master')->insert([
            'news_site_category_name' => 'ニュース'
        ]);
        //test data
    }
}

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events_table')->delete();
        DB::table('events_table')->insert([
            'event_title' => '勉強会',
            'event_text' => 'アアアアアアああああああ',
            'event_start_date_time' => '',
            'event_end_date_time' => '',
            'event_marker_id' => 1
        ]);
        //test data
    }
}

class EventsParticipantsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events_participants_table')->delete();
        DB::table('events_participants_table')->insert([
            'event_id' => 1,
            'event_user_id' => 1,
            'event_authority_id' => 1
        ]);
        //test data
    }
}

class ReportsRisksDealStatusMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_risks_deal_status_master')->delete();
        DB::table('reports_risks_deal_status_master')->insert([
            'report_risk_deal_status_name' => '対処中'
        ]);
        //test data
    }
}

class ReportsRisksCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_risks_categories_master')->delete();
        DB::table('reports_risks_categories_master')->insert([
            'report_risk_category_name' => '危険度大',
            'report_risk_num' => 1
        ]);
        //test data
    }
}

class EventsAuthoritiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events_authorities_table')->delete();
        DB::table('events_authorities_table')->insert([
            'event_authority_name' => '編集権'
        ]);
        //test data
    }
}