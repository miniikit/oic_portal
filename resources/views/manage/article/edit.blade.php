@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
    <link rel="stylesheet" href="/css/manage/edit.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_article_list') }}" class="breadcrumb">記事一覧</a>
    <a href="{{ route('manager_article_detail',$id) }}" class="breadcrumb">記事詳細</a>
    <a href="{{ route('manager_article_edit',$id) }}" class="breadcrumb">記事編集</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">記事編集</h1>
        </div>
        <form action="{{ route('manager_article_update',$id) }}" method="POST">
            <div class="main-content">
                <table>
                    <thead>
                    <tr>
                        <th class="th-box">ID</th>
                        <td class="td-box">{{ $id }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">記事タイトル</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="articleTitle"
                                   value="{{ old('articleTitle',$article->article_title) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">記事本文</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="articleText"
                                   value="{{ old('articleText',$article->article_text) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">記事画像</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="articleImage"
                                   value="{{ old('articleImage',$article->article_image) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">記事URL</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="articleURL"
                                   value="{{ old('articleURL',$article->article_url) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">サイト名</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="siteName"
                                   value="{{ old('siteName',$article->news_site_name) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">作成日</th>
                        <td class="td-box">{{ date('Y年m月d日', strtotime($article->created_at)) }}</td>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="btn-box col s12">
                <div class="col s6 center">
                    <a href="{{ route('manager_article_detail',$id) }}"
                       class="back-btn waves-effect waves-light btn">戻る</a>
                </div>
                <div class="col s6 center">
                    <button type="submit" class="edit-btn waves-effect waves-light btn">更新</button>
                </div>
            </div>
            {{ csrf_field() }}
        </form>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });

        $(function () {
            var setFileInput = $('.imgInput'),
                setFileImg = $('.imgView');
            setFileInput.each(function () {
                var selfFile = $(this),
                    selfInput = $(this).find('input[type=file]'),
                    prevElm = selfFile.find(setFileImg),
                    orgPass = prevElm.attr('src');
                selfInput.change(function () {
                    var file = $(this).prop('files')[0],
                        fileRdr = new FileReader();
                    if (!this.files.length) {
                        prevElm.attr('src', orgPass);
                        return;
                    } else {
                        if (!file.type.match('image.*')) {
                            prevElm.attr('src', orgPass);
                            return;
                        } else {
                            fileRdr.onload = function () {
                                prevElm.attr('src', fileRdr.result);
                            }
                            fileRdr.readAsDataURL(file);
                        }
                    }
                });
            });
        });
    </script>
@endsection
