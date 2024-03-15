@extends('layout.main')
@section('content')
    @if (isset($_SESSION['errors']) && isset($_GET['msg']))
        <ul style="list-style: none">
            @foreach ($_SESSION['errors'] as $ers)
                <li style="color: rgb(255, 255, 255); height: 30px; width: 100%; background-color: rgb(255, 0, 0)">
                    {{ $ers }}
                </li>
            @endforeach
        </ul>
    @endif

    @if (isset($_SESSION['success']) && isset($_GET['msg']))
        <h3 style="background-color: rgb(70, 247, 0); width: 500px; height: 50px; color: cyan; text-align: center;">
            {{ $_SESSION['success'] }}</h3>
    @endif
    <a href="{{ route('list-course') }}">Quay lại</a>
    <h2>Cập nhật sản phẩm</h2>
    <form action="{{ route('edit-course/'.$detail->id) }}" method="post">
        Name:<input type="text" name="course_name" placeholder="Mời bạn nhập name" value="{{$detail->course_name}}">
        Price:<input type="price" name="price" placeholder="Mời bạn nhập price" value="{{$detail->price}}">
        Teacher:<input type="text" name="teacher_name" placeholder="Mời bạn nhập teacher name" value="{{$detail->teacher_name}}">
        Description:<input type="text" name="description" placeholder="Mời bạn nhập description" value="{{$detail->description}}">
        <input type="submit" value="Thêm mới" name="btn">
    </form>
@endsection
