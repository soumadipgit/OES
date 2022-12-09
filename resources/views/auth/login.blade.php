@extends('layout.layout-common')
@section('space-work')
    <h1>Login</h1>

    @if ($errors->any())
        {
        @foreach ($errors->all() as $error)
            {
            <p style="color:brown">{{ $error }}</p>
            }
        @endforeach
        }
    @endif

    @if (Session::has('error'))
        <p style="color:brown">{{ Session::get('error') }}</p>
    @endif

    <form action="{{ route('userLogin') }}" method="post">
        @csrf
        <div>
            <input type="email" name="email" placeholder="Enter your user name">
            <br><br>
            <input type="password" name="password" placeholder="Enter your password">
            <br><br>
            <input type="submit" value="submit" name="submit">
        </div>
    </form>
    @if (Session::has('success'))
        <p style="color:chartreuse">{{ Seesion::has('success') }}</p>
    @endif
@endsection
