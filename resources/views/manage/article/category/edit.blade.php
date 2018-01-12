@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
    <link rel="stylesheet" href="/css/manage/edit.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_article_category_list') }}" class="breadcrumb">記事カテゴリ一覧</a>
    <a href="{{ route('manager_article_category_detail',$id) }}" class="breadcrumb">記事カテゴリ詳細</a>
    <a href="{{ route('manager_article_category_edit',$id) }}" class="breadcrumb">記事カテゴリ編集</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">記事カテゴリ編集</h1>
        </div>
        <form action="{{ route('manager_article_category_update',$id) }}" method="POST">
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
                    </thead>
                </table>
            </div>
            <div class="btn-box col s12">
                <div class="col s6 center">
                    <a href="{{ route('manager_article_category_detail',$id) }}"
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
