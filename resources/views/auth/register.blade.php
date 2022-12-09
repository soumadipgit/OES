@extends('layout.layout-common')
@section('space-work')
    <h2>Student Registration</h2>


    @if ($errors->any())
        {
        @foreach ($errors->all() as $error)
            {
            <p style="color:brown">{{ $error }}</p>
            }
        @endforeach
        }
    @endif
    <form action="{{ route('studentRegister') }}" method="post">
        @csrf

        <div>
            <input type="text" name="name" placeholder="Enter Your name">
            <br><br>
            <input type="email" name="email" placeholder="Enter Your email">
            <br><br>
            <input type="password" name="password" placeholder="Enter Your password">
            <br><br>
            <input type="password" name="conf_password" placeholder="Enter Your confirm password">
            <br><br>
            <input type="submit" name="submit" value="submit">
            <br><br>
        </div>
    </form>

    @if (Session::has('success'))
        <p style="color:rgb(14, 212, 47)">{{ Session::get('success') }}</p>
    @endif
@endsection()
