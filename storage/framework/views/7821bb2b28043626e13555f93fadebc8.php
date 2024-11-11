<form class="shadow-1" action="<?php echo e(isset($article) ? route('articles.update', $article->id) : '/article'); ?>" method="POST"
    enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php if(isset($article)): ?>
        <?php echo method_field('PATCH'); ?>
    <?php endif; ?>
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
            <textarea type="text" maxlength="100" id="title" placeholder="Drag the bottom right corner to resize."
                name="title" required><?php echo e(old('title', $article->title ?? '')); ?></textarea>
        </div>
    </section>

    <section id="content-section" class="editor" style="display: none;">
        <div>
            <h3>Write your article content here</h3>
            <span>Write your thoughts and ideas here. <strong>Drag to resize</strong> and fire away!</span>
        </div>

        <textarea id="content" name="content" required><?php echo e(old('content', $article->content ?? '')); ?></textarea>
    </section>

    <section id="references-section" class="editor" style="display: none;">
        <div>
            <h3>Any references for your article?</h3>
            <span>Cite your sources as much as possible.</span>
        </div>

        <div id="references-container">
            <?php if(isset($article) && $article->references): ?>
                <?php $__currentLoopData = $article->references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="reference-group">
                        <div class="reference-item">
                            <input type="text" placeholder="Reference link" name="references[]"
                                class="reference-input" value="<?php echo e($reference); ?>">
                            <button type="button" class="remove-reference"><i
                                    class="iconoir-minus-circle"></i></button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="reference-group">
                    <div class="reference-item">
                        <input type="text" placeholder="Reference link" name="references[]" class="reference-input">
                        <button type="button" class="remove-reference"><i class="iconoir-minus-circle"></i></button>
                    </div>
                </div>
            <?php endif; ?>
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
                <?php echo e(!isset($article) ? 'required' : ''); ?> class="image-input">
            <?php if(!isset($article->image)): ?>
                <span class="upload-text">Choose an image</span>
            <?php endif; ?>
            <?php if(isset($article->image)): ?>
                <img id="preview" src="<?php echo e(Storage::url($article->image)); ?>" alt="Image Preview" class="preview-img">
            <?php else: ?>
                <img id="preview" alt="Image Preview" class="preview-img" style="display: none;">
            <?php endif; ?>
        </div>

        <div class="buttons">
            <button type="button" id="reset-image">Reset Image</button>
            <button type="submit"><?php echo e(isset($article) ? 'Update Article' : 'Submit Article'); ?></button>
        </div>
    </section>
</form>
<?php /**PATH C:\Users\loren\OneDrive\Documents\All Programming Projects\GROUPED PROJECTS\school projects\blue-alert\resources\views/components/create-article-form.blade.php ENDPATH**/ ?>