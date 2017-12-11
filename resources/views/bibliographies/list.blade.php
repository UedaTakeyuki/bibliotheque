@extends('layouts.base')

@section('header_left_button')
@endsection

@section('header_right_button')
  <a class="button btn" href="/bibliographies/create">
  	追加
  </a>
@endsection

@section('content')
    @foreach($bibliographies as $bibliography)
        <article>
        	<form method="post" action="/bibliographies/{{$bibliography->id}}">
                <input name="_method" type="hidden" value="delete">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy" onclick="javascript:return confirm('本当に削除しますか？')">
          </form>
          <b>登録日: </b>{{$bibliography->created_at}}<br>
          <b>タイトル: </b>{{$bibliography->title}}<br>;
          <b>価格: </b>{{$bibliography->price}}<br>;
          <b>メモ: </b>{{$bibliography->memo}}<br><hr>;
        </article>
    @endforeach
@endsection