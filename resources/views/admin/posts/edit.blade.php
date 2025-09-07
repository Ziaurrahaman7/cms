@extends('dashboard')

@section('content')
@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Edit Post</h3>
        </div>
        <div class="p-6">
                    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" 
                                   id="title" name="title" value="{{ old('title', $post->title) }}" required>
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug (URL)</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror" 
                                   id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
                            @error('slug')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                            <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror" 
                                   id="image" name="image" accept="image/*">
                            @if($post->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Current image" class="w-32 h-32 object-cover rounded">
                                    <p class="text-sm text-gray-500 mt-1">Current image</p>
                                </div>
                            @endif
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('content') border-red-500 @enderror" 
                                      id="content" name="content" rows="35" style="min-height: 700px;" required>{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror" id="status" name="status" required>
                                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- SEO Section -->
                        <div class="border-t pt-6 mt-6">
                            <h4 class="text-lg font-medium text-gray-800 mb-4">SEO Settings</h4>
                            
                            <div class="mb-4">
                                <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_title') border-red-500 @enderror" 
                                       id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}" maxlength="60">
                                <p class="text-xs text-gray-500 mt-1">Recommended: 50-60 characters</p>
                                @error('meta_title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                                <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_description') border-red-500 @enderror" 
                                          id="meta_description" name="meta_description" rows="3" maxlength="160">{{ old('meta_description', $post->meta_description) }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Recommended: 150-160 characters</p>
                                @error('meta_description')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_keywords') border-red-500 @enderror" 
                                       id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $post->meta_keywords) }}" placeholder="keyword1, keyword2, keyword3">
                                <p class="text-xs text-gray-500 mt-1">Separate keywords with commas</p>
                                @error('meta_keywords')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            <a href="{{ route('admin.posts.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition-colors">Cancel</a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors">Update Post</button>
                        </div>
                    </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>



<script>
const initialContent = {!! json_encode(old('content', $post->content)) !!};

ClassicEditor.create(document.querySelector('#content'), {
    toolbar: {
        items: [
            'heading', '|',
            'bold', 'italic', 'underline', 'strikethrough', '|',
            'fontSize', 'fontColor', 'fontBackgroundColor', '|',
            'link', 'insertImage', 'insertTable', '|',
            'bulletedList', 'numberedList', 'outdent', 'indent', '|',
            'alignment', 'blockQuote', 'codeBlock', '|',
            'undo', 'redo', 'sourceEditing'
        ]
    },
    heading: {
        options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
        ]
    },
    fontSize: {
        options: [ 9, 11, 13, 'default', 17, 19, 21 ]
    },
    image: {
        toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side']
    },
    table: {
        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
    }
}).then(editor => {
    window.editor = editor;
    if (initialContent) {
        editor.setData(initialContent);
    }
}).catch(error => {
    console.error(error);
});
</script>
@endsection