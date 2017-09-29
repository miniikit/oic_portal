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

## Git設定

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
git remote add orogin https://github.com/自分のgithubユーザー名/oic_portal.git 
```


### 操作
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
git pull origin/master 
```