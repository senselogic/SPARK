<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<div id="view-pages-view">
    <div class="form-limited form-centered margin-bottom-1rem">
        <div class="tool-container">
            <?php  $filter_name = "PageFilter"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/filter.php'; ?>
            <?php  $list_mode_name = "PageListMode"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/list_mode.php'; ?>
            <?php if ( HasSessionMinimumUserRole( 'editor' ) ) { ?>
                <a class="form-button form-button-large add-button" href="/admin/page/add">
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="cell-list page-section form-section is-hidden">
        <div class="form-container table-container page-table sortable-table">
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Route' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Type Slug' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Language Code Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Is Active' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Title' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Heading' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Teaser' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Path' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Video Path' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Meta Title' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Meta Description' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Meta Image Path' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Action' ) ); ?>
            </div>
            <?php foreach ( $this->PageArray as  $page ) { ?>
                <div class="sortable-table-row filter-row filter-content">
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page->Slug ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page->Route ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page->TypeSlug ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page->Number ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page->LanguageCodeArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page->IsActive ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div>
                            <?php foreach ( LanguageCodeArray as  $language_code ) { ?>
                                <div class="form-translation">
                                    <?php echo htmlspecialchars( GetValueText( GetTranslatedText( $page->Title, $language_code ) ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div>
                            <?php foreach ( LanguageCodeArray as  $language_code ) { ?>
                                <div class="form-translation">
                                    <?php echo htmlspecialchars( GetValueText( GetTranslatedText( $page->Heading, $language_code ) ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div>
                            <?php foreach ( LanguageCodeArray as  $language_code ) { ?>
                                <div class="form-translation">
                                    <?php echo htmlspecialchars( GetTranslatedText( $page->Teaser, $language_code ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page->ImagePath ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page->ImageVerticalPosition ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page->ImageHorizontalPosition ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page->VideoPath ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div>
                            <?php foreach ( LanguageCodeArray as  $language_code ) { ?>
                                <div class="form-translation">
                                    <?php echo htmlspecialchars( GetValueText( GetTranslatedText( $page->MetaTitle, $language_code ) ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div>
                            <?php foreach ( LanguageCodeArray as  $language_code ) { ?>
                                <div class="form-translation">
                                    <?php echo htmlspecialchars( GetTranslatedText( $page->MetaDescription, $language_code ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page->MetaImagePath ) ); ?>
                    </div>
                    <div class="form-centered sortable-table-cell">
                        <a class="form-button view-button" href="/admin/page/view/<?php echo htmlspecialchars( $page->Id ); ?>">
                        </a>
                        <?php if ( HasSessionMinimumUserRole( 'editor' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/page/edit/<?php echo htmlspecialchars( $page->Id ); ?>">
                            </a>
                            <a class="form-button remove-button" href="/admin/page/remove/<?php echo htmlspecialchars( $page->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-list is-hidden">
        <?php foreach ( $this->PageArray as  $page ) { ?>
            <div class="card-container filter-row">
                <div class="card">
                    <div class="form-container">
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?> :
                        </div>
                        <div>
                            <input-component result-class="form-input" result-name="Slug" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $page->Slug ) ); ?>" result-readonly></input-component>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Route' ) ); ?> :
                        </div>
                        <div>
                            <input-component result-class="form-input" result-name="Route" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $page->Route ) ); ?>" result-readonly></input-component>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Type Slug' ) ); ?> :
                        </div>
                        <div>
                            <select class="form-select" name="TypeSlug" readonly>
                                <?php  $page_type_array = $this->PageTypeArray; ?>
                                <?php foreach ( $page_type_array as  $page_type ) { ?>
                                    <option value="<?php echo htmlspecialchars( GetValueText( $page_type->Slug ) ); ?>"<?php if ( $page->TypeSlug === $page_type->Slug ) echo ' selected'; ?>><?php echo htmlspecialchars( GetUntranslatedText( $page_type->Title ) ); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
                        </div>
                        <div>
                            <input-component result-class="form-input" result-name="Number" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $page->Number ) ); ?>" result-readonly></input-component>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Language Code Array' ) ); ?> :
                        </div>
                        <div>
                            <input-component result-class="form-input" result-name="LanguageCodeArray" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $page->LanguageCodeArray ) ); ?>" result-readonly></input-component>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Is Active' ) ); ?> :
                        </div>
                        <div>
                            <select class="form-select" name="IsActive" readonly>
                                <option value="0"<?php if ( $page->IsActive === '0' ) echo ' selected'; ?>>False</option>
                                <option value="1"<?php if ( $page->IsActive === '1' ) echo ' selected'; ?>>True</option>
                            </select>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Title' ) ); ?> :
                        </div>
                        <div>
                            <multilingual-input-component container-class="form-input" result-name="Title" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $page->Title ) ); ?>" result-readonly language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-input-component>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Heading' ) ); ?> :
                        </div>
                        <div>
                            <multilingual-input-component container-class="form-input" result-name="Heading" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $page->Heading ) ); ?>" result-readonly language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-input-component>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Teaser' ) ); ?> :
                        </div>
                        <div>
                            <multilingual-textarea-component container-class="form-textarea" result-name="Teaser" result-readonly language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"><?php echo htmlspecialchars( $page->Teaser ); ?></multilingual-textarea-component>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Path' ) ); ?> :
                        </div>
                        <div>
                            <image-path-input-component container-class="form-upload-container" result-class="form-input" result-name="ImagePath" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $page->ImagePath ) ); ?>" result-readonly image-class="form-upload-image" error-image-path="/static/image/admin/missing_image.svg"></image-path-input-component>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position' ) ); ?> :
                        </div>
                        <div>
                            <select class="form-select" name="ImageVerticalPosition" readonly>
                                <option value="top"<?php if ( $page->ImageVerticalPosition === 'top' ) echo ' selected'; ?>>Top</option>
                                <option value="10%"<?php if ( $page->ImageVerticalPosition === '10%' ) echo ' selected'; ?>>10%</option>
                                <option value="20%"<?php if ( $page->ImageVerticalPosition === '20%' ) echo ' selected'; ?>>20%</option>
                                <option value="30%"<?php if ( $page->ImageVerticalPosition === '30%' ) echo ' selected'; ?>>30%</option>
                                <option value="40%"<?php if ( $page->ImageVerticalPosition === '40%' ) echo ' selected'; ?>>40%</option>
                                <option value="center"<?php if ( $page->ImageVerticalPosition === 'center' ) echo ' selected'; ?>>Center</option>
                                <option value="60%"<?php if ( $page->ImageVerticalPosition === '60%' ) echo ' selected'; ?>>60%</option>
                                <option value="70%"<?php if ( $page->ImageVerticalPosition === '70%' ) echo ' selected'; ?>>70%</option>
                                <option value="80%"<?php if ( $page->ImageVerticalPosition === '80%' ) echo ' selected'; ?>>80%</option>
                                <option value="90%"<?php if ( $page->ImageVerticalPosition === '90%' ) echo ' selected'; ?>>90%</option>
                                <option value="bottom"<?php if ( $page->ImageVerticalPosition === 'bottom' ) echo ' selected'; ?>>Bottom</option>
                            </select>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position' ) ); ?> :
                        </div>
                        <div>
                            <select class="form-select" name="ImageHorizontalPosition" readonly>
                                <option value="left"<?php if ( $page->ImageHorizontalPosition === 'left' ) echo ' selected'; ?>>Left</option>
                                <option value="10%"<?php if ( $page->ImageHorizontalPosition === '10%' ) echo ' selected'; ?>>10%</option>
                                <option value="20%"<?php if ( $page->ImageHorizontalPosition === '20%' ) echo ' selected'; ?>>20%</option>
                                <option value="30%"<?php if ( $page->ImageHorizontalPosition === '30%' ) echo ' selected'; ?>>30%</option>
                                <option value="40%"<?php if ( $page->ImageHorizontalPosition === '40%' ) echo ' selected'; ?>>40%</option>
                                <option value="center"<?php if ( $page->ImageHorizontalPosition === 'center' ) echo ' selected'; ?>>Center</option>
                                <option value="60%"<?php if ( $page->ImageHorizontalPosition === '60%' ) echo ' selected'; ?>>60%</option>
                                <option value="70%"<?php if ( $page->ImageHorizontalPosition === '70%' ) echo ' selected'; ?>>70%</option>
                                <option value="80%"<?php if ( $page->ImageHorizontalPosition === '80%' ) echo ' selected'; ?>>80%</option>
                                <option value="90%"<?php if ( $page->ImageHorizontalPosition === '90%' ) echo ' selected'; ?>>90%</option>
                                <option value="right"<?php if ( $page->ImageHorizontalPosition === 'right' ) echo ' selected'; ?>>Right</option>
                            </select>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Video Path' ) ); ?> :
                        </div>
                        <div>
                            <video-path-input-component container-class="form-upload-container" result-class="form-input" result-name="VideoPath" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $page->VideoPath ) ); ?>" result-readonly video-class="form-upload-video" error-video-path="/static/video/admin/missing_video.mp4"></video-path-input-component>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Meta Title' ) ); ?> :
                        </div>
                        <div>
                            <multilingual-input-component container-class="form-input" result-name="MetaTitle" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $page->MetaTitle ) ); ?>" result-readonly language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-input-component>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Meta Description' ) ); ?> :
                        </div>
                        <div>
                            <multilingual-textarea-component container-class="form-textarea" result-name="MetaDescription" result-readonly language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"><?php echo htmlspecialchars( $page->MetaDescription ); ?></multilingual-textarea-component>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Meta Image Path' ) ); ?> :
                        </div>
                        <div>
                            <image-path-input-component container-class="form-upload-container" result-class="form-input" result-name="MetaImagePath" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $page->MetaImagePath ) ); ?>" result-readonly image-class="form-upload-image" error-image-path="/static/image/admin/missing_image.svg"></image-path-input-component>
                        </div>
                    </div>
                    <?php if ( HasSessionMinimumUserRole( 'editor' ) ) { ?>
                        <div class="form-toolbar">
                            <a class="form-button edit-button" href="/admin/page/edit/<?php echo htmlspecialchars( $page->Id ); ?>">
                            </a>
                            <a class="form-button remove-button" href="/admin/page/remove/<?php echo htmlspecialchars( $page->Id ); ?>">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
