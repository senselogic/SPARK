<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-blocks-view">
    <div class="form-limited form-centered margin-bottom-1rem">
        <div class="tool-container">
            <?php $filter_name = "BlockFilter"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/filter.php'; ?>
            <?php $list_mode_name = "BlockListMode"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/list_mode.php'; ?>
            <?php if ( HasSessionMinimumUserRole( 'contributor' ) ) { ?>
                <a class="form-button form-button-large add-button" href="/admin/block/add">
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="cell-list page-section form-section is-hidden">
        <div class="form-container table-container block-table sortable-table">
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Page Id' ) ); ?>
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
                <?php echo htmlspecialchars( GetTextBySlug( 'Minimum Height' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Title' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Title Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Teaser' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Teaser Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Route' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Route Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Side' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Title' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Title Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Path' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Path Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Fit' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Video Path' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Video Path Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Document Path' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Document Path Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Key Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Value Array' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Action' ) ); ?>
            </div>
            <?php foreach ( $this->BlockArray as $block ) { ?>
                <div class="sortable-table-row filter-row filter-content">
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->Slug ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->PageId ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->TypeSlug ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->Number ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->LanguageCodeArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->MinimumHeight ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div class="form-translation-list">
                            <?php foreach ( GetTranslationArray( $block->Title, DefaultLanguageCode ) as $translation ) { ?>
                                <div class="form-translation-data">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Data ) ); ?>
                                </div>
                                <div class="form-translation-specifier">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Specifier ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->TitleArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div class="form-translation-list">
                            <?php foreach ( GetTranslationArray( $block->Teaser, DefaultLanguageCode ) as $translation ) { ?>
                                <div class="form-translation-data">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Data ) ); ?>
                                </div>
                                <div class="form-translation-specifier">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Specifier ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->TeaserArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div class="form-translation-list">
                            <?php foreach ( GetTranslationArray( $block->Text, DefaultLanguageCode ) as $translation ) { ?>
                                <div class="form-translation-data">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Data ) ); ?>
                                </div>
                                <div class="form-translation-specifier">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Specifier ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->TextArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div class="form-translation-list">
                            <?php foreach ( GetTranslationArray( $block->Route, DefaultLanguageCode ) as $translation ) { ?>
                                <div class="form-translation-data">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Data ) ); ?>
                                </div>
                                <div class="form-translation-specifier">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Specifier ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->RouteArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->ImageSide ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div class="form-translation-list">
                            <?php foreach ( GetTranslationArray( $block->ImageTitle, DefaultLanguageCode ) as $translation ) { ?>
                                <div class="form-translation-data">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Data ) ); ?>
                                </div>
                                <div class="form-translation-specifier">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Specifier ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->ImageTitleArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->ImagePath ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->ImagePathArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->ImageVerticalPosition ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->ImageVerticalPositionArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->ImageHorizontalPosition ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->ImageHorizontalPositionArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->ImageFit ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->VideoPath ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->VideoPathArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->DocumentPath ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->DocumentPathArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->KeyArray ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $block->ValueArray ) ); ?>
                    </div>
                    <div class="form-centered sortable-table-cell">
                        <a class="form-button view-button" href="/admin/block/view/<?php echo htmlspecialchars( $block->Id ); ?>">
                        </a>
                        <?php if ( HasSessionMinimumUserRole( 'contributor' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/block/edit/<?php echo htmlspecialchars( $block->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'contributor' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/block/remove/<?php echo htmlspecialchars( $block->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-list is-hidden">
        <?php foreach ( $this->BlockArray as $block ) { ?>
            <div class="card-container filter-row">
                <div class="card">
                    <div class="form-container" data-is-row data-table-name="BLOCK">
                        <div class="form-field-name" data-is-column-title data-column-name="Slug">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Slug">
                            <input-component class="form-component" result-name="Slug" result-value="<?php echo htmlspecialchars( GetValueText( $block->Slug ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="PageId">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Page Id' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="PageId">
                            <dropdown-component class="form-component" result-name="PageId" result-value="<?php echo htmlspecialchars( GetValueText( $block->PageId ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetElementPropertyArray( $this->PageArray, 'Id' ) ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetUntranslatedElementArray( GetElementPropertyArray( $this->PageArray, 'Title' ) ) ) ) ); ?>"></dropdown-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="TypeSlug">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Type Slug' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="TypeSlug">
                            <dropdown-component class="form-component" result-name="TypeSlug" result-value="<?php echo htmlspecialchars( GetValueText( $block->TypeSlug ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetElementPropertyArray( $this->BlockTypeArray, 'Slug' ) ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetUntranslatedElementArray( GetElementPropertyArray( $this->BlockTypeArray, 'Name' ) ) ) ) ); ?>"></dropdown-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Number">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Number">
                            <input-component class="form-component" result-name="Number" result-value="<?php echo htmlspecialchars( GetValueText( $block->Number ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="LanguageCodeArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Language Code Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="LanguageCodeArray">
                            <dropdown-list-component class="form-component" result-name="LanguageCodeArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->LanguageCodeArray ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'en', 'fr', 'de', 'ja', 'ru' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'English', 'French', 'German', 'Japanese', 'Russian' ] ) ) ); ?>"></dropdown-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="MinimumHeight">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Minimum Height' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="MinimumHeight">
                            <input-component class="form-component" result-name="MinimumHeight" result-value="<?php echo htmlspecialchars( GetValueText( $block->MinimumHeight ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Title">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Title' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Title">
                            <multilingual-text-input-component class="form-component" result-name="Title" result-value="<?php echo htmlspecialchars( GetValueText( $block->Title ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="TitleArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Title Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="TitleArray">
                            <multilingual-text-input-list-component class="form-component" result-name="TitleArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->TitleArray ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Teaser">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Teaser' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Teaser">
                            <multilingual-text-input-component class="form-component" result-name="Teaser" result-value="<?php echo htmlspecialchars( GetValueText( $block->Teaser ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="TeaserArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Teaser Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="TeaserArray">
                            <multilingual-text-input-list-component class="form-component" result-name="TeaserArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->TeaserArray ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Text">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Text">
                            <multilingual-text-input-component class="form-component" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $block->Text ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="TextArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Text Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="TextArray">
                            <multilingual-text-input-list-component class="form-component" result-name="TextArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->TextArray ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Route">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Route' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Route">
                            <multilingual-input-component class="form-component" result-name="Route" result-value="<?php echo htmlspecialchars( GetValueText( $block->Route ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="RouteArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Route Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="RouteArray">
                            <multilingual-input-list-component class="form-component" result-name="RouteArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->RouteArray ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-input-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="ImageSide">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Side' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="ImageSide">
                            <dropdown-component class="form-component" result-name="ImageSide" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImageSide ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'left', 'right' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Left', 'Right' ] ) ) ); ?>"></dropdown-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="ImageTitle">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Title' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="ImageTitle">
                            <multilingual-text-input-component class="form-component" result-name="ImageTitle" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImageTitle ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="ImageTitleArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Title Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="ImageTitleArray">
                            <multilingual-text-input-list-component class="form-component" result-name="ImageTitleArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImageTitleArray ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="ImagePath">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Path' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="ImagePath">
                            <multilingual-image-path-input-component class="form-component" result-name="ImagePath" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImagePath ) ); ?>" is-readonly error-image-path="/static/image/admin/missing_image.svg" upload-api-url="/admin/upload/image" delete-api-url="/admin/delete/file" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-image-path-input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="ImagePathArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Path Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="ImagePathArray">
                            <image-path-input-list-component class="form-component" result-name="ImagePathArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImagePathArray ) ); ?>" is-readonly error-image-path="/static/image/admin/missing_image.svg" upload-api-url="/admin/upload/image" delete-api-url="/admin/delete/file"></image-path-input-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="ImageVerticalPosition">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="ImageVerticalPosition">
                            <dropdown-component class="form-component" result-name="ImageVerticalPosition" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImageVerticalPosition ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'top', '10%', '20%', '30%', '40%', 'center', '60%', '70%', '80%', '90%', 'bottom' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Top', '10%', '20%', '30%', '40%', 'Center', '60%', '70%', '80%', '90%', 'Bottom' ] ) ) ); ?>"></dropdown-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="ImageVerticalPositionArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="ImageVerticalPositionArray">
                            <dropdown-list-component class="form-component" result-name="ImageVerticalPositionArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImageVerticalPositionArray ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'top', '10%', '20%', '30%', '40%', 'center', '60%', '70%', '80%', '90%', 'bottom' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Top', '10%', '20%', '30%', '40%', 'Center', '60%', '70%', '80%', '90%', 'Bottom' ] ) ) ); ?>"></dropdown-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="ImageHorizontalPosition">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="ImageHorizontalPosition">
                            <dropdown-component class="form-component" result-name="ImageHorizontalPosition" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImageHorizontalPosition ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'left', '10%', '20%', '30%', '40%', 'center', '60%', '70%', '80%', '90%', 'right' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Left', '10%', '20%', '30%', '40%', 'Center', '60%', '70%', '80%', '90%', 'Right' ] ) ) ); ?>"></dropdown-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="ImageHorizontalPositionArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="ImageHorizontalPositionArray">
                            <dropdown-list-component class="form-component" result-name="ImageHorizontalPositionArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImageHorizontalPositionArray ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'left', '10%', '20%', '30%', '40%', 'center', '60%', '70%', '80%', '90%', 'right' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Left', '10%', '20%', '30%', '40%', 'Center', '60%', '70%', '80%', '90%', 'Right' ] ) ) ); ?>"></dropdown-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="ImageFit">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Image Fit' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="ImageFit">
                            <dropdown-component class="form-component" result-name="ImageFit" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImageFit ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'cover', 'contain' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Cover', 'Contain' ] ) ) ); ?>"></dropdown-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="VideoPath">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Video Path' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="VideoPath">
                            <multilingual-video-path-input-component class="form-component" result-name="VideoPath" result-value="<?php echo htmlspecialchars( GetValueText( $block->VideoPath ) ); ?>" is-readonly error-video-path="/static/video/admin/missing_video.mp4" upload-api-url="/admin/upload/video" delete-api-url="/admin/delete/file" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-video-path-input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="VideoPathArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Video Path Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="VideoPathArray">
                            <video-path-input-list-component class="form-component" result-name="VideoPathArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->VideoPathArray ) ); ?>" is-readonly error-video-path="/static/video/admin/missing_video.mp4" upload-api-url="/admin/upload/video" delete-api-url="/admin/delete/file"></video-path-input-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="DocumentPath">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Document Path' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="DocumentPath">
                            <document-path-input-component class="form-component" result-name="DocumentPath" result-value="<?php echo htmlspecialchars( GetValueText( $block->DocumentPath ) ); ?>" is-readonly error-image-path="/static/image/admin/missing_image.svg" document-image-path="/static/image/admin/document_icon.svg" upload-api-url="/admin/upload/document" delete-api-url="/admin/delete/file"></document-path-input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="DocumentPathArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Document Path Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="DocumentPathArray">
                            <document-path-input-list-component class="form-component" result-name="DocumentPathArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->DocumentPathArray ) ); ?>" is-readonly error-image-path="/static/image/admin/missing_image.svg" document-image-path="/static/image/admin/document_icon.svg" upload-api-url="/admin/upload/document" delete-api-url="/admin/delete/file"></document-path-input-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="KeyArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Key Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="KeyArray">
                            <multilingual-text-input-list-component class="form-component" result-name="KeyArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->KeyArray ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="ValueArray">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Value Array' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="ValueArray">
                            <multilingual-text-input-list-component class="form-component" result-name="ValueArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->ValueArray ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
                        </div>
                    </div>
                    <div class="form-toolbar">
                        <?php if ( HasSessionMinimumUserRole( 'contributor' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/block/edit/<?php echo htmlspecialchars( $block->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'contributor' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/block/remove/<?php echo htmlspecialchars( $block->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/block_footer.php'; ?>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
