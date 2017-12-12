@extends('layouts.jqm.base')

@section('header_left_button')
  <a data-role="button" data-inline="true" href="bibliographies/download" data-transition="fade" data-ajax="false">ダウンロード</a>
@endsection

@section('header_right_button')
  <a data-role="button" data-inline="true" href="bibliographies/create" data-transition="fade" data-ajax="false">追加</a>
@endsection

@section('content')
    @foreach($bibliographies as $bibliography)
        <article>
        	<form method="post" action="/bibliographies/{{$bibliography->id}}">
                <input name="_method" type="hidden" value="delete">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" value="削除" class="btn btn-sm btn-destroy" onclick="javascript:return confirm('本当に削除しますか？')" data-role="button" data-inline="true">
          </form>
          <b>登録日: </b>{{$bibliography->created_at}}<br>
          <b>タイトル: </b>{{$bibliography->title}}<br>
          <b>価格: </b>{{$bibliography->price}}<br>
          <b>メモ: </b>{{$bibliography->memo}}<br><hr>
        </article>
    @endforeach
@endsection