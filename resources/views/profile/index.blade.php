@extends('layouts.index')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                <div class="post">
                    <div class="row">
                        <div class="text col-md-6">
                                <label class="col-md-2">名前</label>
                            <div class="name">
                                {{ Str::limit($post->name, 150) }}
                            </div>
                                <label class="col-md-2">性別</label>
                            <div class="name">
                                {{ Str::limit($post->gender, 150) }}
                            </div>
                                <label class="col-md-2">趣味</label>
                            <div class="name">
                                {{ Str::limit($post->hobby, 150) }}
                            </div>
                                <label class="col-md-3">自己紹介欄</label>
                            <div class="name">
                                {{ Str::limit($post->introduction, 1500) }}
                            </div>
                        </div>
                    </div>
                </div>
                <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection