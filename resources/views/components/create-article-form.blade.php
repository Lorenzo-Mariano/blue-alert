<form class="shadow-1" action="/article" method="POST">
    @csrf
    <div class="parts">
        <button type="button" class="toggle-section" data-target="title-section">Title</button>
        <button type="button" class="toggle-section" data-target="content-section">Content</button>
        <button type="button" class="toggle-section" data-target="references-section">References</button>
    </div>

    <section id="title-section" class="editor">
        <div>
            <h3>What would you like to call your article?</h3>
            <span>Make sure it catches the reader's attention. Be concise and thought-provoking!</span>
        </div>
        <div class="title-area">
            <label for="title">Title (100 characters max)</label>
            <textarea type="text" maxlength="100" id="title" placeholder="Drag the bottom right corner to resize."
                name="title" required></textarea>
        </div>
        <button type="button" class="to-content toggle-section" data-target="content-section">Next</button>
    </section>

    <section id="content-section" class="editor" style="display: none;">
        <h3>Write your article content here</h3>
        <textarea id="content" name="content" required></textarea>
        <button type="button" class="to-references">Next</button>
    </section>

    <section id="references-section" class="editor" style="display: none;">
        <h3>Any references for your article?</h3>
        <input type="text" placeholder="Reference link" name="reference">
        <button type="submit">Submit Article</button>
    </section>
</form>
