Route::get('/mycontroller', [App\Http\Controllers\MyController::class, 'index']);

@extends('IndexBase')
@endsection('title','My Controller')
@section('header','My view')

@section('content')
    <form action = ""method="">
        @call_user_func
        <label for ="num">ป้อนสูตรคูณ</label>
        <input type="number" name="num" id="num">
        <button type="submit"> ส่งข้อมูล </button>
    </form>
    @endsection