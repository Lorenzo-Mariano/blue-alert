<form class="shadow-1" action="{{ isset($article) ? route('articles.update', $article->id) : '/article' }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @if (isset($article))
        @method('PATCH')
    @endif
    <div class="parts">
        <button type="button" class="toggle-section" data-target="title-section">Title</button>
        <button type="button" class="toggle-section" data-target="content-section">Content</button>
        <button type="button" class="toggle-section" data-target="references-section">References</button>
        <button type="button" class="toggle-section" data-target="image-section">Image</button>
    </div>

    <section id="title-section" class="editor">
        <div>
            <h3>What would you like to call your article?</h3>
            <span>Make sure it catches the reader's attention. Be concise and thought-provoking!</span>
        </div>
        <div class="title-area">
            <label for="title">Title (100 characters max)</label>
            <textarea type="text" maxlength="100" id="title" rows="6"
                placeholder="Drag the bottom right corner to resize." name="title" required>{{ old('title', $article->title ?? '') }}</textarea>
        </div>
    </section>

    <section id="content-section" class="editor" style="display: none;">
        <div>
            <h3>Write your article content here</h3>
            <span>Write your thoughts and ideas here. <strong>Drag to resize</strong> and fire away!</span>
        </div>

        <textarea id="content" name="content" rows="20" required>{{ old('content', $article->content ?? '') }}</textarea>
    </section>

    <section id="references-section" class="editor" style="display: none;">
        <div>
            <h3>Any references for your article?</h3>
            <span>Cite your sources as much as possible.</span>
        </div>

        <div id="references-container">
            @if (isset($article) && $article->references)
                @foreach ($article->references as $reference)
                    <div class="reference-group">
                        <div class="reference-item">
                            <input type="text" placeholder="Reference link" name="references[]"
                                class="reference-input" value="{{ $reference }}">
                            <button type="button" class="remove-reference"><i
                                    class="iconoir-minus-circle"></i></button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="reference-group">
                    <div class="reference-item">
                        <input type="text" placeholder="Reference link" name="references[]" class="reference-input">
                        <button type="button" class="remove-reference"><i class="iconoir-minus-circle"></i></button>
                    </div>
                </div>
            @endif
        </div>

        <button type="button" id="add-reference" class="editor-button">
            <i class="iconoir-plus-circle"></i>
            Add Reference
        </button>
    </section>

    <section id="image-section" class="editor" style="display: none;">
        <div>
            <h3>Upload an image for your article</h3>
            <span>This will be used as the thumbnail for your article.</span>
        </div>
        <div class="image-upload-container" id="image-upload-container">
            <input type="file" name="image" id="image" accept="image/*"
                {{ !isset($article) ? 'required' : '' }} class="image-input">
            @if (!isset($article->image))
                <span class="upload-text">Choose an image</span>
            @endif
            @if (isset($article->image))
                <img id="preview" src="{{ Storage::url($article->image) }}" alt="Image Preview" class="preview-img">
            @else
                <img id="preview" alt="Image Preview" class="preview-img" style="display: none;">
            @endif
        </div>

        <div class="buttons">
            <button type="button" id="reset-image">Reset Image</button>
            <button type="submit">{{ isset($article) ? 'Update Article' : 'Submit Article' }}</button>
        </div>
    </section>
</form>
