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
            <h3 class="text-lg font-semibold text-gray-800">Create New Post</h3>
        </div>
        <div class="p-6">
                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" required onkeyup="generateSlug()">
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug (URL)</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror" 
                                   id="slug" name="slug" value="{{ old('slug') }}">
                            @error('slug')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                            <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror" 
                                   id="image" name="image" accept="image/*">
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('content') border-red-500 @enderror" 
                                      id="content" name="content" rows="35" style="min-height: 700px; display: none;">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror" id="status" name="status" required>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
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
                                       id="meta_title" name="meta_title" value="{{ old('meta_title') }}" maxlength="60">
                                <p class="text-xs text-gray-500 mt-1">Recommended: 50-60 characters</p>
                                @error('meta_title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                                <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_description') border-red-500 @enderror" 
                                          id="meta_description" name="meta_description" rows="3" maxlength="160">{{ old('meta_description') }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Recommended: 150-160 characters</p>
                                @error('meta_description')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_keywords') border-red-500 @enderror" 
                                       id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="keyword1, keyword2, keyword3">
                                <p class="text-xs text-gray-500 mt-1">Separate keywords with commas</p>
                                @error('meta_keywords')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            <a href="{{ route('admin.posts.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition-colors">Cancel</a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors" onclick="console.log('Button clicked')">Create Post</button>
                        </div>
                    </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-2">Choose Editor:</label>
    <select id="editorChoice" class="w-full px-3 py-2 border border-gray-300 rounded-md" onchange="switchEditor()">
        <option value="ckeditor">CKEditor 5</option>
        <option value="quill">Quill Editor</option>
        <option value="summernote">Summernote</option>
        <option value="textarea">Plain Text</option>
    </select>
</div>

<div id="quill-container" style="display:none;">
    <div id="quill-editor" style="height: 700px;"></div>
</div>

<script>
function generateSlug() {
    const title = document.getElementById('title').value;
    const slug = title.toLowerCase()
        .replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .trim('-');
    document.getElementById('slug').value = slug;
}

let ckeditorInstance;
let quillInstance;
let currentEditor = 'ckeditor';

// Initialize CKEditor
ClassicEditor.create(document.querySelector('#content'), {
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo']
}).then(editor => {
    ckeditorInstance = editor;
    // Remove required attribute from textarea since CKEditor handles it
    document.getElementById('content').removeAttribute('required');
}).catch(error => {
    console.error(error);
});

// Initialize Quill
quillInstance = new Quill('#quill-editor', {
    theme: 'snow',
    modules: {
        toolbar: [['bold', 'italic', 'underline'], ['link', 'blockquote', 'code-block'], [{ 'list': 'ordered'}, { 'list': 'bullet' }], ['clean']]
    }
});

function switchEditor() {
    const choice = document.getElementById('editorChoice').value;
    const textarea = document.getElementById('content');
    const quillContainer = document.getElementById('quill-container');
    
    // Get current content
    let content = '';
    if (currentEditor === 'ckeditor' && ckeditorInstance) {
        content = ckeditorInstance.getData();
    } else if (currentEditor === 'quill') {
        content = quillInstance.root.innerHTML;
    } else if (currentEditor === 'summernote') {
        content = $('#content').summernote('code');
    } else {
        content = textarea.value;
    }
    
    // Destroy current editor
    if (currentEditor === 'ckeditor' && ckeditorInstance) {
        ckeditorInstance.destroy();
    } else if (currentEditor === 'summernote') {
        $('#content').summernote('destroy');
    }
    
    // Hide all editors
    textarea.style.display = 'none';
    quillContainer.style.display = 'none';
    
    // Show and initialize selected editor
    if (choice === 'ckeditor') {
        textarea.style.display = 'block';
        textarea.value = content;
        ClassicEditor.create(textarea, {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo']
        }).then(editor => {
            ckeditorInstance = editor;
            editor.setData(content);
        });
    } else if (choice === 'quill') {
        quillContainer.style.display = 'block';
        quillInstance.root.innerHTML = content;
        // Update hidden textarea
        textarea.value = content;
        quillInstance.on('text-change', function() {
            textarea.value = quillInstance.root.innerHTML;
        });
    } else if (choice === 'summernote') {
        textarea.style.display = 'block';
        textarea.value = content;
        $('#content').summernote({
            height: 700,
            toolbar: [['style', ['bold', 'italic', 'underline']], ['font', ['strikethrough']], ['para', ['ul', 'ol', 'paragraph']], ['insert', ['link', 'picture']]]
        });
        $('#content').summernote('code', content);
    } else {
        textarea.style.display = 'block';
        textarea.value = content;
    }
    
    currentEditor = choice;
}

// Form submission handler
const form = document.querySelector('form');
if (form) {
    form.addEventListener('submit', function(e) {
        console.log('Form submitting...');
        
        if (currentEditor === 'ckeditor' && ckeditorInstance) {
            document.getElementById('content').value = ckeditorInstance.getData();
        } else if (currentEditor === 'quill') {
            document.getElementById('content').value = quillInstance.root.innerHTML;
        } else if (currentEditor === 'summernote') {
            document.getElementById('content').value = $('#content').summernote('code');
        }
        
        const content = document.getElementById('content').value;
        console.log('Content:', content);
        
        if (!content || content.trim() === '' || content === '<p><br></p>' || content === '<p></p>') {
            e.preventDefault();
            alert('Content is required');
            return false;
        }
        
        // Remove required attribute to prevent browser validation
        document.getElementById('content').removeAttribute('required');
        
        return true;
    });
}
</script>
@endsection