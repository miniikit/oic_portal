<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<p>
    お問い合わせの手続きが完了しました。<br>
</p>
<br>
<div>
    <p> お名前: {{ $data['username'] }}</p>
    <p> メールアドレス: {{ $data['email'] }}</p>
    <p> お問い合わせ内容: {{ $data['contents'] }}</p>


    <p>今後ともOIC Portalをよろしくお願いします。</p><br>
    <p>快適なOICライフをお過ごし下さいませ</p><br>
</div>
<br>
    -----------------------------------------<br>
     OIC Portal<br>
　　　URL: https://oicportal.herokuapp.com<br>
     Email: oicportalapp@gmail.com<br>
    -----------------------------------------<br>
</body>
</html>