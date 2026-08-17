<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-texts-view">
    <div class="form-limited form-centered margin-bottom-1rem">
        <div class="tool-container">
            <?php $filter_name = "TextFilter"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/filter.php'; ?>
            <?php $list_mode_name = "TextListMode"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/list_mode.php'; ?>
            <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                <a class="form-button form-button-large add-button" href="/admin/text/add">
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="cell-list page-section form-section is-hidden">
        <div class="form-container table-container text-table sortable-table">
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Action' ) ); ?>
            </div>
            <?php foreach ( $this->TextArray as $text ) { ?>
                <div class="sortable-table-row filter-row filter-content">
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $text->Slug ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div class="form-translation-list">
                            <?php foreach ( GetTranslationArray( $text->Text, DefaultLanguageCode ) as $translation ) { ?>
                                <div class="form-translation-data">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Data ) ); ?>
                                </div>
                                <div class="form-translation-specifier">
                                    <?php echo htmlspecialchars( GetValueText( $translation->Specifier ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-centered sortable-table-cell">
                        <a class="form-button view-button" href="/admin/text/view/<?php echo htmlspecialchars( $text->Id ); ?>">
                        </a>
                        <?php if ( HasSessionMinimumUserRole( 'author' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/text/edit/<?php echo htmlspecialchars( $text->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/text/remove/<?php echo htmlspecialchars( $text->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-list is-hidden">
        <?php foreach ( $this->TextArray as $text ) { ?>
            <div class="card-container filter-row">
                <div class="card">
                    <div class="form-container" data-is-row data-table-name="TEXT">
                        <div class="form-field-name" data-is-column-title data-column-name="Slug">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Slug">
                            <input-component class="form-component" result-name="Slug" result-value="<?php echo htmlspecialchars( GetValueText( $text->Slug ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Text">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Text">
                            <multilingual-text-input-component class="form-component" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $text->Text ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
                        </div>
                    </div>
                    <div class="form-toolbar">
                        <?php if ( HasSessionMinimumUserRole( 'author' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/text/edit/<?php echo htmlspecialchars( $text->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/text/remove/<?php echo htmlspecialchars( $text->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
