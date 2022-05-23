@extends('layouts.app')

@section('content')

<section class="dashboard-section">
    <h2>Welcome, {{ Auth::user()->username }}</h2>

    
    <form method="POST" action="/deleteAuthor">
        @csrf
            <input style="display: none;" type="text" id="idAut" name="idAut" value="">

            <button onclick="location.href=''" class="admin-button edit-btn">Edit account</button>

            <button class="admin-button delete-btn" onclick="location.href='">Delete account <i class="fa-solid fa-triangle-exclamation"></i></button>

        </form>
</section>

@endsection
