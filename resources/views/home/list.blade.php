@extends('template/master')
@section('css')
    <link rel="stylesheet" href="/css/Top/top.css">
@endsection

@section('main')

    @include('common.top_card')

@endsection

@section('script')
    <script type="text/javascript">
        $(".button-collapse").sideNav();

        $(document).ready(function () {
            $('select').material_select();
        });

        $(".dropdown-button").dropdown();
    </script>
@endsection
