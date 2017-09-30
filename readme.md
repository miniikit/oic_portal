## 導入
```
git clone https://github.com/miniikit/oic_portal
```

## 初期設定

```
composer install
```

```
cp .env.example .env
```

```
php artisan key:generate
```

## Git
### レポジトリURL確認
```
git remote -v
```

### リモートリポジトリの名前をorigin→upstreamへ変更
```
git remote rename origin upstream
```


### ローカルリポジトリのURLを登録
```
git remote add origin https://github.com/自分のgithubユーザー名/oic_portal.git 
```


### ローカルリポジトリへ変更内容を反映
```
git add -A
```

```
git status
```

```
git commit -m "コミット名"
```

```
git push -u origin master
```

### fork元の変更を取得
```
git pull origin master 
```

## Laravel

```
php artisan migrate:refresh
```

```
php artisan db::seed
```

```
php artisan serve
```

```
php artisan route::list
```
