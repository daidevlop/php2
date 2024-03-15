@extends('layout.main')
@section('content')
<a href="{{ route('add-course')}}">Them moi san pham</a>
<table border="1">
    <thead>
        <th>ID</th>
        <th>Course Name</th>
        <th>Price</th>
        <th>Teacher Name</th>
        <th>Description</th>
        <th>Action</th>

    </thead>
    <tbody>
         @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->course_name }}</td>
                <td>{{ $course->price }}</td>
                <td>{{ $course->teacher_name }}</td>
                <td>{{ $course->description }}</td>
                <th>
                    <a href="{{ route('detail-course/'.$course->id)}}">Sửa</a>
                    <a onclick="return confirm('bạn có muốn xóa không?')" href="{{ route('delete-course/'.$course->id)}}">Xóa</a>
                </th>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
