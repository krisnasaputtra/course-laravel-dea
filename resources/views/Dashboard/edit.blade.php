@extends('Layout.isUser')

@section('content')
    <div class="wrapper-container-form-post">
        <div class="container-form-post">
            <h3>Edit Post</h3>
            @if ($errors->any())
                <div class="message-error">
                    <h4>Data belum benar/lengkap</h4>
                    @foreach ($errors->all() as $message)
                        <span class="message-text-error"><span data-feather="chevron-right"></span>{{ $message }}</span>
                    @endforeach
                </div>
            @endif
            <form class="form-action" action={{ route('post_update_action') }} method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <label for="title">Title</label>
                <input id="title" type="text" name="title" placeholder="title" required
                    value="{{ old('title', $post->title) }}">
                <label for="tags">Tags</label>
                <input id="tags" type="text" name="tags" placeholder="tags" required
                    value="{{ old('tags', $post->tags) }}">
                <label for="description">Description</label>
                <input id="description" type="hidden" name="description" required
                    value="{{ old('description', $post->description) }}">
                <trix-editor input="description"></trix-editor>
                <button type="submit">Edit Post</button>
            </form>
        </div>
    </div>
@endsection
