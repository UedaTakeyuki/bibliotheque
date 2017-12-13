@extends('layouts.jqm.base')

@section('header_left_button')
  <a href="#dialogPage" data-rel="dialog" data-role="button" data-close-btn-text="Fermer">メニュー</a>
@endsection

@section('header_right_button')
  <a data-role="button" data-inline="true" href="bibliographies/create" data-transition="fade" data-ajax="false">追加</a>
@endsection

@section('content')
    @foreach($bibliographies as $bibliography)
        <article>
        	<form method="post" action="/bibliographies/{{$bibliography->id}}" style="width: 4em">
                <input name="_method" type="hidden" value="delete">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input class="btn btn-sm btn-destroy" value="削除" onclick="javascript:if (confirm('本当に削除しますか？')){submit()}">
          </form>
          <b>登録日: </b>{{$bibliography->created_at}}<br>
          <b>タイトル: </b>{{$bibliography->title}}<br>
          <b>価格: </b>{{$bibliography->price}}<br>
          <b>メモ: </b>{{$bibliography->memo}}<br><hr>
        </article>
    @endforeach
@endsection

@section('dialog')
  <div data-role="page" id="dialogPage">
    <div data-role="header">
      <h2>メニュー</h2>
    </div>
    <div data-role="content">
      <ul data-role="listview">
        <li><a href="bibliographies/download">ダウンロード</a></li>
        <li><a href="logout">ログアウト</a></li>
      </ul>
      <a href="" data-role="button" data-rel="back">メニューを閉じる</a>
    </div>
  </div>
@endsection