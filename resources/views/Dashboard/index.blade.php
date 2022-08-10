@extends('Layout/isUser')

@section('content')
    <div class="header-text-dashboard">
        <h1>Hello, {{ auth()->user()->name }}</h1>
        <hr>
    </div>
    <div class="wrapper-container-form-post">
        <div class="container-form-post">
            <h3>Create Post</h3>
            @if ($errors->any())
                <div class="message-error">
                    <h4>Data belum benar/lengkap</h4>
                    @foreach ($errors->all() as $message)
                        <span class="message-text-error"><span data-feather="chevron-right"></span>{{ $message }}</span>
                    @endforeach
                </div>
            @endif
            <form class="form-action" action={{ route('post_add') }} method="POST">
                @csrf
                <label for="title">Title</label>
                <input id="title" type="text" name="title" required>
                <label for="tags">Tags</label>
                <input id="tags" type="text" name="tags" required>
                <label for="description">Description</label>
                <input id="description" type="hidden" name="description" required>
                <trix-editor input="description"></trix-editor>
                <button type="submit">Add Post</button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="content-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Excerpt</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->excerpt }}</td>
                            <td>{{ $post->tags }}</td>
                            <td class="action-table">
                                <a class="badge bg-primary" href="/post/{{ $post->id }}"><span>detail</span></a>
                                <a class="badge bg-warning" href="/post/edit/{{ $post->id }}"><span>edit</span></a>
                                <form action={{ route('post_delete_action') }} method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                    <button type="submit" class="badge bg-danger"
                                        href=""><span>delete</span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td style="text-align: center" colspan="4">No post created.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
