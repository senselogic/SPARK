<div class="form-container">
    <div class="form-field-name">
        <?php echo htmlspecialchars( GetTextBySlug( 'Route' ) ); ?> :
    </div>
    <div>
        <input class="form-input" name="Route" type="text" value="<?php echo htmlspecialchars( GetValueText(  $page->Route ) ); ?>" readonly/>
    </div>
    <div class="form-field-name">
        <?php echo htmlspecialchars( GetTextBySlug( 'Type Slug' ) ); ?> :
    </div>
    <div>
        <input class="form-input" name="TypeSlug" type="text" value="<?php echo htmlspecialchars( GetValueText( GetElementPropertyByKey( $this->PageTypeBySlugMap, $page->TypeSlug, 'Name', '' ) ) ); ?>" readonly/>
    </div>
    <div class="form-field-name">
        <?php echo htmlspecialchars( GetTextBySlug( 'Title' ) ); ?> :
    </div>
    <div>
        <div>
            <?php foreach ( LanguageCodeArray as  $language_code ) { ?>
                <input class="form-translation form-input" name="Title" type="text" value="<?php echo htmlspecialchars( GetValueText( GetTranslatedText( $page->Title, $language_code ) ) ); ?>" readonly/>
            <?php } ?>
        </div>
    </div>
    <div class="form-field-name">
        <?php echo htmlspecialchars( GetTextBySlug( 'Image Path' ) ); ?> :
    </div>
    <div>
        <input class="form-input" name="ImagePath" type="text" value="<?php echo htmlspecialchars( $page->ImagePath ); ?>" readonly/>
        <div class="form-upload-container">
            <img class="form-upload-image" src="<?php echo htmlspecialchars( $page->ImagePath ); ?>" onerror="this.src='/static/image/admin/missing_image.svg'"/>
        </div>
    </div>
</div>
