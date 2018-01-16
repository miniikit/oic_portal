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
        $this->call('ArticlesCategoriesMasterSeeder');
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
            'name' => '管理者',
            'name_kana' => 'カンリシャ',
            'authority_id' => 3,
            'profile_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //サブ管理者
        DB::table('users')->insert([
            'email' => 'B5502@oic.jp',
            'name' => 'サブ管理者',
            'name_kana' => 'サブカンリシャ',
            'authority_id' => 2,
            'profile_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // ユーザ
        for ($i = 100; $i < 250; $i++) {
            $email = 'B' . rand(1, 9) . $i . '@oic.jp';
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
        $authorities = ['一般', 'サブ管理者', '管理者'];
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
            'course_id' => rand(1, 22),
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
            'course_id' => rand(1, 22),
            'profile_admission_year' => '2014-04-01 00:00:00',
            'profile_url' => 'http://www.oic-portal.co.jp',
            'profile_introduction' => 'Hello',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $nowYear = Carbon::now()->year;
        $baseYear = $nowYear - 4;
        for ($i = 3; $i < 150; $i++) {
            $year = rand($baseYear, $nowYear);
            $month = rand(1, 12);
            $day = rand(1, 30);

            $incorporation = false;

            // 在学中の学生を生成
            $date = Carbon::create($year, 4, 1, 9, 0, 0);

            // 編入学生徒を生成
            if ($i % 30 === 0) {
                $date = Carbon::create($year, $month, $day, 9, 0, 0);
            }

            DB::table('profiles_table')->insert([
                'profile_image' => '/images/profile_images/default.jpg',
                'profile_name' => $faker->name,
                'course_id' => rand(1, 22),
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
        $parentCourses = ['情報処理IT', 'ゲーム', 'CG・映像・アニメーション', 'デザイン・Web'];
        DB::table('courses_master')->delete();
        for ($i = 0; $i < count($parentCourses); $i++) {
            DB::table('courses_master')->insert([
                'course_name' => $parentCourses[$i],
                'parent_course_id' => 0,
                'course_depth' => 0,
                'course_year' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        $courses = ['ITスペシャリスト専攻', 'ネットワークセキュリティ専攻', 'システムエンジニア専攻', 'ネットワークエンジニア専攻', 'Webエンジニア専攻', 'テクニカルコース', 'ネットワークシステムコース', 'ゲームプログラマー専攻', 'ゲームデザイナー専攻', 'ゲームプランナー専攻', 'ゲームクリエイター専攻(PG)', 'ゲームクリエイター専攻(CG)', 'ゲームプログラムコース', 'ゲームCGデザインコース', 'CG映像クリエイター専攻', 'CGクリエイター専攻', 'CG映像コース', 'CGアニメーションコース', 'アートディレクター専攻', 'Webデザインコース', 'グラフィックデザインコース', 'マンガイラストコース'];
        $parents = [1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4];
        $year = [4, 4, 3, 3, 3, 2, 2, 4, 4, 4, 3, 3, 2, 2, 4, 3, 2, 2, 3, 2, 2, 2];
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
        $articleTitle = ['LINE、仮想通貨による決済を導入か　Bloomberg報道','はやぶさ2、小惑星「リュウグウ」目指しエンジン始動　6月到着へ','英単語の問題を自動作成　ベネッセ、ソフトバンクらが実証研究へ','任天堂、コロプラを提訴　「白猫プロジェクト」特許侵害で差し止め・賠償請求','CES2018：Intel、49量子ビットの量子コンピュータ用チップ「Tangle Lake」の開発に成功','トヨタもAlexa採用　北米の一部モデルで','蛍のように光り、空中を飛び回るLED光源　東大などが開発','Adobe、Flash Playerの脆弱性に対処　悪用されれば情報流出の恐れ','Microsoft、1月の月例更新プログラムを公開　56件の脆弱性を修正','CES 2018：「Alexa」搭載カーチャージャー、Ankerが50ドルで発売へ'];
        DB::table('articles_table')->delete();
        for ($i = 1; $i < 10; $i++) {
            DB::table('articles_table')->insert([
                'article_title' => $articleTitle[$i],
                'article_text' => '記事' . $i,
                'article_image' => '/images/sample-' . rand(1, 6) . '.jpg',
                'article_url' => '/articles/' . $i,
                'news_site_id' => rand(1, 20),
                'user_id' => null,
                'article_category_id' => rand(1, 5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        for ($i = 100; $i < 120; $i++) {
            DB::table('articles_table')->insert([
                'article_title' => 'ユーザ記事',
                'article_text' => '去年きょねんの寒さむい冬ふゆのころから、今年ことしの春はるにかけて、たった一ぴきしか金魚きんぎょが生いき残のこっていませんでした。その金魚きんぎょは友ともだちもなく、親おやや、兄弟きょうだいというものもなく、まったくの独ひとりぼっちで、さびしそうに水盤すいばんの中なかを泳およぎまわっていました。
「兄にいさん、この金魚きんぎょは、ほんとうに強つよい金魚きんぎょですこと。たった一つになっても、元気げんきよく遊あそんでいますのね。」と、妹いもうとがいいました。
「ああ、金魚屋きんぎょやがきたら、五、六ぴき買かって、入いれてやろうね。」と、兄あには答こたえました。
　ある日ひのこと、あちらの横道よこみちを、金魚売きんぎょうりの通とおる呼よび声ごえが聞きこえました。
「兄にいさん、金魚売きんぎょうりですよ。」と、妹いもうとは耳みみを立たてながらいいました。
「金魚きんぎょやい――金魚きんぎょやい――。」
「早はやくいって、呼よんでおいでよ。」と、兄あにはいいました。
　妹いもうとは、急いそいで馳かけてゆきました。やがて金魚屋きんぎょやがおけをかついでやってきました。そのとき、お母かあさんも、いちばん末すえの弟おとうとも、戸口とぐちまで出でて金魚きんぎょを見みました。そして、小ちいさな金魚きんぎょを五ひき買かいました。
　水盤すいばんの中なかに、五ひきの金魚きんぎょを入いれてやりますと、去年きょねんからいた金魚きんぎょは、にわかににぎやかになったのでたいへんに喜よろこんだように見みえました。しかし、自分じぶんがその中なかでいちばん大おおきなものですから、王おうさまのごとく先頭せんとうに立たって水みずの中なかを泳およいでいました。後あとから、その子供こどものように、小ちいさな五ひきの金魚きんぎょが泳およいでいたのです。これがため水盤すいばんの中なかまでが明あかるくなったのであります。
「兄にいさん、ほんとうに楽たのしそうなのね。」と、妹いもうとは、水盤すいばんの中なかをのぞいていいました。
「今度こんど、金魚屋きんぎょやがきたら、もっと大おおきいのを買かって入いれよう。」と、兄あにはちょうど、金魚きんぎょの背中せなかが日ひの光ひかりに輝かがやいているのを見みながらいいました。
「けんかをしないでしょうか？」と、妹いもうとは、そのことを気遣きづかったのであります。しかし、兄あには、もっと美うつくしい金魚きんぎょを買かって入いれるということより、ほかのことは考かんがえていませんでした。
「金魚きんぎょやい――金魚きんぎょやい――。」
　二度どめに、金魚屋きんぎょやがやってきたときに、兄あには、お母かあさんから三びきの大おおきい金魚きんぎょを買かってもらいました。それらは、いままでいた大おおきな金魚きんぎょよりも、みんな大おおきかったのです。かえって、水盤すいばんの中なかはそうぞうしくなりました。けれど、去年きょねんからいた一ぴきの金魚きんぎょは、この家うちは、やはり自分じぶんの家うちだというふうに、悠々ゆうゆうとして水みずの面おもてを泳およいでいました。五ひきの小ちいさな金魚きんぎょは、おそれたのであるか、すみの方ほうに寄よってじっとしていました。三びきの新あたらしく仲間なかま入いりをした金魚きんぎょのうち二ひきは、ちょいとようすが変かわったので驚おどろいたというふうで、ぼんやりとしていましたが、その中うち一ぴきは生うまれつきの乱暴者らんぼうものとみえて、遠慮えんりょもなく水みずの中なかを走はしりまわっていました。
　三びきの金魚きんぎょの入はいってきたのをあまり気きにも止とめないようすで、前まえからいた一ぴきの金魚きんぎょは、長ながい間あいだすみ慣なれた水盤すいばんの中なかを、さも自分じぶんの家うちでも歩あるくように泳およいでいますと、ふいに不遠慮ぶえんりょな一ぴきが横合よこあいから、その金魚きんぎょをつつきました。
「あんまり威張いばるものでない。だれの家うちと、きまったわけではないだろう。そんなにすまさなくてもいいはずだ。」と、ののしるごとく思おもわれました。
　前まえからいた金魚きんぎょは、相手あいてにならないで、やはりすましたふうで泳およいでいますと、乱暴者らんぼうものは、ますます意地悪いじわるくその後あとを追おいかけたのです。こんな有あり様さまでありましたから、いつしか五ひきの小ちいさな金魚きんぎょは夜よるのうちに、みんな乱暴者らんぼうもののために殺ころされてしまいました。一月ひとつきばかり後あとまで、生いき残のこっていたのは、前まえからいる金魚きんぎょと乱暴者らんぼうものと、もう一ぴきの金魚きんぎょと、わずかに三びきでありました。
「兄にいさん、金魚きんぎょは弱よわいものね。今度こんど死しんでしまったら、もう飼かうことはよしましょうね。」と、妹いもうとはいいました。
「ああ、金魚きんぎょよりこいのほうが強つよいかもしれないよ。」と、兄あには答こたえました。
「兄にいさん、こいを買かっておくれ、毎晩まいばん、夜店よみせに売うっているから。」と、末すえの弟おとうとがいいました。
　その日ひのことであります。暮くれ方がた、妹いもうとは、末すえの弟おとうとをつれて夜店よみせを見みにいって、帰かえりに三寸ずんばかりの強つよそうな赤あかと黒くろと斑ぶちのこいを二ひき買かってきました。そして、それを水盤すいばんの中なかに放はなったのです。
　月つきの照てらす下したで、水面すいめんにさざなみをたてて、こいの跳おどる音おとを聞ききました。それから四、五日にちもたつと、三びきの金魚きんぎょは、みんなこいのために、つつかれて殺ころされてしまいました。後あとには、二ひきのこいだけが元気げんきよく泳およぎまわっていました。
「とうとう、こいが天下てんかを取とってしまった。」と、兄あにはいいました。
「ほんとうに憎にくいこいですこと。」と、妹いもうとはいいました。
　一日にち、兄あには留守るすでした。妹いもうとは憎にくらしいこいだからといって、毎日まいにち換かえてやる水みずを怠おこたりました。たった、一日にちでしたけれど、あつい日ひであったもので、水みずが煮にえて、さすがに威張いばっていたこいも死しんでしまいました。そのときからすでに幾日いくちにもたちました。いまだに水盤すいばんの中なかはだれの天下てんかでもなく、まったく空からになっています。
',
                'article_image' => '/images/sample-' . rand(1, 6) . '.jpg',
                'article_url' => '/articles/user/' . $i,
                'user_id' => rand(3,100),
                'news_site_id' => null,
                'article_category_id' => rand(1, 5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }


        $urls = [
            "http://gigazine.net/news/20180114-family-doesnt-feel-pain/",
            "http://gigazine.net/news/20180114-lunar-gravity-simulation/",
            "http://gigazine.net/news/20180113-spinnaker-million-arm-core/"
        ];

        for ($i = 0; $i < count($urls); $i++) {
            DB::table('articles_table')->insert([
                'article_title' => '記事' . $i,
                'article_text' => '記事' . $i,
                'article_image' => '/images/sample-' . rand(1, 6) . '.jpg',
                'article_url' => $urls[$i],
                'news_site_id' => 2,
                'user_id' => null,
                'article_category_id' => rand(1, 5),
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
                'article_id' => rand(1,120),
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
        $articlesComments = ['good', 'like', 'Hello'];
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
        $reportsContents = ['不適切な内容を含んでいます', '攻撃的な内容を含んでいます', '利用規約・その他法令に違反しています'];
        DB::table('reports_table')->delete();

        for ($i = 0; $i < 50; $i++) {
            DB::table('reports_table')->insert([
                'report_category_id' => rand(1, 4),
                'user_id' => rand(1, 150),
                'report_contents' => $reportsContents[rand(0, 2)],
                'report_deal_status_id' => rand(1, 3),
                'created_at' => Carbon::now()->subday($i),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ReportsDealsTableSeeder extends Seeder
{
    public function run()
    {
        $reportsComments = ['連絡がありません', '対応を考えています', 'コンタクトを取っています'];
        DB::table('reports_deals_table')->delete();
        for ($i = 0; $i < 100; $i++) {
            DB::table('reports_deals_table')->insert([
                'report_id' => rand(1,50),
                'user_id' => rand(3,100),
                'report_deal_comment' => $reportsComments[rand(0,2)],
                'created_at' => Carbon::now()->subday($i),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ReportsCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $reportCategories = ['不適切な内容', '誹謗中傷', '規約違反', 'その他'];
        DB::table('reports_categories_master')->delete();
        for ($i = 0; $i < count($reportCategories); $i++) {
            DB::table('reports_categories_master')->insert([
                'report_category_name' => $reportCategories[$i],
                'report_risk_id' => rand(1, 4),
                'created_at' => Carbon::now()->subday($i),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ReportsRisksDealStatusMasterSeeder extends Seeder
{
    public function run()
    {
        $reportsRisksDealStatus = ['未対処', '対処中', '完了'];
        DB::table('reports_risks_deal_status_master')->delete();
        for ($i = 0; $i < count($reportsRisksDealStatus); $i++) {
            DB::table('reports_risks_deal_status_master')->insert([
                'report_risk_deal_status_name' => $reportsRisksDealStatus[$i],
                'created_at' => Carbon::now()->subday($i),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class ReportsRisksCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $reportsRisksCategories = ['低', '中', '高', '最高'];
        DB::table('reports_risks_categories_master')->delete();
        for ($i = 0; $i < count($reportsRisksCategories); $i++) {
            DB::table('reports_risks_categories_master')->insert([
                'report_risk_category_name' => $reportsRisksCategories[$i],
                'report_risk_num' => $i + 1,
                'created_at' => Carbon::now()->subday($i),
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
        $communitiesCategories = ['趣味', 'スポーツ', '勉強'];
        DB::table('communities_categories_master')->delete();
        for ($i = 0; $i < count($communitiesCategories); $i++) {
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
        $titles = ["情報部","ゲーム部","Webデザイン部"];
        $contents = ["システム開発や外部イベントなどに積極的に参加しています。","最新のゲーム技術を体験し、日々未来的なテーマを企画しています。","デザインについて日々取り組んでいます。"];

        DB::table('communities_table')->delete();
        for ($i = 0; $i < count($titles); $i++) {
            $int = $i +1;
            DB::table('communities_table')->insert([
                'community_title' => $titles[$i],
                'community_image' => '/images/community_images/sample-' . $int . '.jpg',
                'community_contents' => $contents[$i],
                'community_category_id' => rand(1, 3),
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
        for ($i = 1; $i < 250; $i++) {
            DB::table('communities_participants_table')->insert([
                'community_id' => rand(1, 50),
                'user_id' => $i,
                'authority_id' => rand(1, 3),
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
        $communitiesCommentsContents = ['Hello', 'welcome', 'goodnight'];
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
        /*
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'User',
            'news_site_url' => 'User',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.cntimage p',
            'news_site_tag_image' => '.cntimage img',
            'article_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        */

        // GIGAZINE
        DB::table('news_sites_master')->insert([
            'news_site_name' => 'GIGAZINE',
            'news_site_url' => 'http://feed.rssad.jp/rss/gigazine/rss_2.0',
            'news_site_tag_title' => 'item title',
            'news_site_tag_url' => 'item link',
            'news_site_tag_text' => '.cntimage p',
            'news_site_tag_image' => '.cntimage img',
            'article_category_id' => 1,
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
            'article_category_id' => 1,
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
            'article_category_id' => 1,
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
            'article_category_id' => 1,
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
            'article_category_id' => 1,
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
            'article_category_id' => 1,
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
            'article_category_id' => 1,
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
            'article_category_id' => 1,
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
            'article_category_id' => 1,
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
            'article_category_id' => 1,
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
            'article_category_id' => 1,
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
            'article_category_id' => 5,
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
            'article_category_id' => 5,
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
            'article_category_id' => 5,
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
            'article_category_id' => 3,
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
            'article_category_id' => 2,
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
            'article_category_id' => 3,
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
            'article_category_id' => 3,
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
            'article_category_id' => 1,
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
            'article_category_id' => 3,
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
            'article_category_id' => 2,
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
            'article_category_id' => 3,
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
            'article_category_id' => 2,
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
            'article_category_id' => 2,
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
            'article_category_id' => 1,
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
            'article_category_id' => 5,
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
            'article_category_id' => 2,
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
            'article_category_id' => 1
        ]);
        */
    }

}

class ArticlesCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $ArticlesCategories = ['IT', 'ゲーム', 'CG・映像・アニメーション','デザイン・web', '経済','その他'];
        DB::table('articles_categories_master')->delete();
        for ($i = 0; $i < count($ArticlesCategories); $i++) {
            DB::table('articles_categories_master')->insert([
                'articles_category_name' => $ArticlesCategories[$i],
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

        $eventTitle = ['プログラミング勉強会', 'デザイン勉強会', 'ネットワーク/インフラ技術を学ぼう!'];
        $eventTexts = ['色々なプログラム言語を学ぼう', 'Adobeデザインツールを使用した勉強会を行います!', 'ネットワークエンジニア/インフラエンジニアが実際に使っている技術を体験していただきます。'];
        DB::table('events_table')->delete();
        for ($i = 0; $i < count($eventTitle); $i++) {
            $int = $i +1;
            DB::table('events_table')->insert([
                'event_title' => $eventTitle[$i],
                'event_text' => $eventTexts[$i],
                'event_image' => '/images/event_images/sample-' . $int . '.jpg',
                'event_start_date_time' => Carbon::now(),
                'event_end_date_time' => Carbon::now(),
                'event_spot' => '大阪市内',
                'event_capacity' => rand(10, 500),
                'event_maker_id' => rand(1, $makermax),
                'event_category_id' => rand(1,3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
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
                'event_id' => rand(1, $max),
                'event_user_id' => rand(1, $usermax),
                'event_authority_id' => rand(1, $authoritymax),
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
        $eventsAuthorities = ['管理者', 'ユーザ'];
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

        $chatTexts = ['hello', 'goodnight', 'sleepy', 'hello', 'goodnight', 'sleepy', 'hello', 'goodnight', 'sleepy', 'hello', 'goodnight', 'sleepy', 'hello', 'goodnight', 'sleepy'];
        DB::table('chats_table')->delete();
        for ($i = 1; $i < count($chatTexts); $i++) {
            DB::table('chats_table')->insert([
                'chat_user_id' => rand(1, $usermax),
                'chat_user2_id' => rand(1, $user2max),
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
        $categories = ["予約", "実行中", "実行完了", "キャンセル"];
        DB::table('crawler_status_master')->delete();
        foreach ($categories as $category) {
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
        $baseDate = Carbon::now()->subDay($max-4);
        $now = Carbon::now();
        $today = Carbon::today();

        $user = 0;

        DB::table('crawler_schedule_table')->delete();
        for ($i = 0; $i < $max; $i++) {
            $date = $baseDate;
            $date = $date->addDay(1);
            $endDate = $date;
            $endDate = $endDate->addMinute(rand(10,50)); // $dateにもaddHourが反映されてしまう

            // 時々ユーザが実行したことに
            if ($i % 4 === 0) {
                $user = rand(1, 50);
            }


            // 追加記事数
            $addedArticlesCount = rand(20,40);

            // 実行状態を指定
            if($date >= $now){  // 未来
                $crawlerStatus = 1; // 予約
                $addedArticlesCount = 0;
                $endDate = null;
            } else if($date >= $today){   // 本日
                $crawlerStatus = 2;   // 実行中
            } else {
                $crawlerStatus = rand(3,4); //完了、キャンセル
            }


            DB::table('crawler_schedule_table')->insert([
                'crawl_start_time' => $date,
                'crawl_end_time' => $endDate,
                'crawl_status_id' => $crawlerStatus,
                'added_articles_count' => $addedArticlesCount,
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
