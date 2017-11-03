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
        $this->call('ChatsTableSeeder');
        $this->call('InquiriesTableSeeder');
        $this->call('MessagesTableSeeder');

        Model::reguard();
    }
}

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'email' => 'b9999@oic.jp',
                'name' => '山田太郎',
                'name_kana' => 'ヤマダタロウ',
                'authority_id' => $i,
                'course_id' => $i,
                'profile_id' => $i
            ]);
        }
    }
}

class AuthoritiesMasterSeeder extends Seeder
{
    public function run()
    {
        $authorities = ['一般', 'サブ管理者', '管理者'];
        DB::table('authorities_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
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
        DB::table('profiles_table')->delete();
        for ($i = 0; $i < 10; $i++) {
            DB::table('profiles_table')->insert([
                'profile_image' => '',
                'profile_name' => 'hoge',
                'course_id' => $i,
                'profile_admission_year' => 2017,
                'profile_url' => '',
                'profile_introduction' => ''
            ]);
        }
    }
}

class CoursesMasterSeeder extends Seeder
{
    public function run()
    {
        $categories = ['総合情報メディア', '', ''];
        DB::table('courses_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
            DB::table('courses_master')->insert([
                'course_name' => $categories[$i],
                'parent_course_id' => $i,
                'course_depth' => $i,
                'course_admission_year' => 2017
            ]);
        }
    }
}

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_table')->delete();
        for ($i = 0; $i < 10; $i++) {
            DB::table('articles_table')->insert([
                'article_title' => '新商品',
                'article_text' => '新商品が',
                'article_image' => '',
                'news_site_id' => $i
            ]);
        }
    }
}

class ArticlesLikesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_likes_table')->delete();
        for ($i = 0; $i < 5; $i++) {
            DB::table('articles_likes_table')->insert([
                'article_id' => $i,
                'user_id' => $i
            ]);
        }
    }
}

class ArticlesCommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_comments_table')->delete();
        for ($i = 0; $i < 10; $i++) {
            DB::table('articles_comments_table')->insert([
                'article_id' => $i,
                'user_id' => $i,
                'article_comment_text' => 'あああああああ'
            ]);
        }
    }
}

class ReportsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_table')->delete();
        for ($i = 0; $i < 5; $i++) {
            DB::table('reports_table')->insert([
                'report_category_id' => $i,
                'user_id' => $i,
                'report_contents' => 'テスト',
                'report_deal_status_id' => $i
            ]);
        }
    }
}

class ReportsDealsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_deals_table')->delete();
        for ($i = 0; $i < 5; $i++) {
            DB::table('reports_deals_table')->insert([
                'report_id' => $i,
                'user_id' => $i,
                'report_deal_comment' => '削除しました'
            ]);
        }
    }
}

class ReportsCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $reportCategories = ['不適切', '誹謗中傷', '規約違反'];
        DB::table('reports_categories_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
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
        $communitiesCategories = ['#test1', '#test2', '#test3'];
        DB::table('communities_categories_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
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
        for ($i = 0; $i < 5; $i++) {
            DB::table('communities_table')->insert([
                'community_title' => '会',
                'community_contents' => 'あああああ',
                'authority_id' => $i
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
        DB::table('communities_comments_table')->delete();
        for ($i = 0; $i < 5; $i++) {
            DB::table('communities_comments_table')->insert([
                'community_id' => $i,
                'user_id' => $i,
                'community_comment_contents' => 'コミュニティコメント'
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
            'news_site_url' => 'http://feed.rssad.jp/rss/gigazine/rss_2.0',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // TrendMicro 技術ブログ
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://feeds.trendmicro.com/TM-Securityblog/',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 速報
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_bursts.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 国内記事
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_domestic.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 海外記事
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_foreign.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia ベンチャー
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_venture.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 製品動向
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_products.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 科学・テクノロジー
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_technology.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia ネットトピック
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_nettopics.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 社会とIT
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_society.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia セキュリティ
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_security.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia 企業・業界動向
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_industry.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia リサーチ
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_research.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        // ITmedia PR
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/itmnews/2.0/news_special.xml',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        //MdN DESIGN
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'http://rss.rssad.jp/rss/mdn/di/rss.php',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        //ファミ通APP
        DB::table('news_sites_master')->insert([
            'news_site_url' => 'https://app.famitsu.com/feed/',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

        //
        DB::table('news_sites_master')->insert([
        'news_site_url' => '',
            'news_site_tag_title' => 'item title',
            'news_site_tag_article' => 'item link',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);

    }

}

class NewsSitesCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $newsSitesCategories = ['#test1', '#test2', '#test3'];
        DB::table('news_sites_categories_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
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
        DB::table('events_table')->delete();
        for ($i = 0; $i < 5; $i++) {
            DB::table('events_table')->insert([
                'event_title' => '勉強会',
                'event_text' => '勉強会開催します',
                'event_start_date_time' => 20170101,
                'event_end_date_time' => 20171231,
                'event_marker_id' => $i
            ]);
        }
    }
}

class EventsParticipantsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events_participants_table')->delete();
        for ($i = 0; $i < 10; $i++) {
            DB::table('events_participants_table')->insert([
                'event_id' => $i,
                'event_user_id' => $i,
                'event_authority_id' => $i
            ]);
        }
    }
}

class ReportsRisksDealStatusMasterSeeder extends Seeder
{
    public function run()
    {
        $reportsRisksDealStatus = ['対処待ち', '対処中', '対処済'];
        DB::table('reports_risks_deal_status_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
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
        $reportsRisksCategories = ['#test1', '#test2', '#test3'];
        DB::table('reports_risks_categories_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
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
        $eventsAuthorities = ['#test1', '#test2', '#test3'];
        DB::table('events_authorities_table')->delete();
        for ($i = 0; $i < count($i); $i++) {
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
        DB::table('chats_table')->delete();
        for ($i = 0; $i < 5; $i++) {
            DB::table('chats_table')->insert([
                'chat_user_id' => $i,
                'chat_user2_id' => $i,
                'chat_text' => 'hello'
            ]);
        }
    }
}

class InquiriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('inquiries_table')->delete();
        DB::table('inquiries_table')->insert([
            'inquiry_text' => 'ログインについての問い合わせ'
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