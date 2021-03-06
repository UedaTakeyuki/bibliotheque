@extends('layouts.base')

@section('header_left_button')
@endsection

@section('header_right_button')
  <div class="button btn" href="/bibliographies/add">
    戻る
  </div>
@endsection

@section('content')
    <FORM>
      <INPUT TYPE=BUTTON OnClick="readISBNCord();" VALUE="ISBNコードのスキャン" class="btn btn-default btn-lg btn-block active">
    </FORM>

    <FORM>
      <INPUT TYPE=BUTTON OnClick="readJANCord();" VALUE="JANコードのスキャン" class="btn btn-default btn-lg btn-block active">
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
      <input type="submit"   {{$isSubmitEnabled ? '' : 'disabled'}} value="登録" class="btn btn-default btn-lg btn-block active" />
    </form>
@endsection