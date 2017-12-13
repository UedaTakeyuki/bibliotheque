@extends('layouts.jqm.base')

@section('header_left_button')
  <a href="#dialogPage" data-rel="dialog" data-role="button" data-close-btn-text="Fermer">メニュー</a>
@endsection

@section('header_right_button')
  <a data-role="button" data-inline="true" href="/bibliographies" data-transition="fade" data-ajax="false">戻る</a>
@endsection

@section('content')
    <FORM>
      <INPUT OnClick="readISBNCord();" VALUE="ISBNコードのスキャン" class="btn btn-default btn-lg btn-block active">
    </FORM>

    <FORM>
      <INPUT OnClick="readJANCord();" VALUE="JANコードのスキャン" class="btn btn-default btn-lg btn-block active">
    </FORM>

    <p style="color: orangered; font-weight: 700">{{$error_str}}</p>
    <form action="{{action('BibliographyController@store')}}" method="post" data-ajax="false" onsubmit="return block_duplex(this.submit)">
      <input type="hidden" name="_token"                    value="{{ csrf_token() }}">
      <input type="hidden" name="isbn"      id="isbn"       value="{{session('isbn')}}" />
      <input type="hidden" name="title"     id="title"      value="{{session('title')}}" />
      <input type="hidden" name="creator"   id="creator"    value="{{session('creator')}}" />
      <input type="hidden" name="publisher" id="publisher"  value="{{session('publisher')}}" />
      <input type="hidden" name="price"     id="price"      value="{{session('price')}}" />
      <input type="hidden" name="user_id"   id="user_id"    value="{{$user_id}}" />
        ISBN: {{session('isbn')}}<br>
        書名: {{session('title')}}<br>
        価格: {{session('price')}}{{is_null(session('price'))?"":"円"}}<br>
      <textarea {{$isSubmitEnabled ? '' : 'disabled'}} name="memo" id="memo" placeholder="メモ" class="form-control" rows="2"></textarea>
      <input {{$isSubmitEnabled ? '' : 'disabled'}} value="登録" class="btn btn-default btn-lg btn-block active" onclick="submit()"/>
<!--      <input type="submit"   {{$isSubmitEnabled ? '' : 'disabled'}} value="登録" class="btn btn-default btn-lg btn-block active" /> avoid JQM effect -->
    </form>
@endsection

@section('dialog')
  <div data-role="page" id="dialogPage">
    <div data-role="header">
      <h2>メニュー</h2>
    </div>
    <div data-role="content">
      <ul data-role="listview">
        <li><a href="logout">ログアウト</a></li>
      </ul>
      <a href="" data-role="button" data-rel="back">メニューを閉じる</a>
    </div>
  </div>
@endsection