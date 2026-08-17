<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-languages-view">
    <div class="form-limited form-centered margin-bottom-1rem">
        <div class="tool-container">
            <?php $filter_name = "LanguageFilter"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/filter.php'; ?>
            <?php $list_mode_name = "LanguageListMode"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/list_mode.php'; ?>
            <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                <a class="form-button form-button-large add-button" href="/admin/language/add">
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="cell-list page-section form-section is-hidden">
        <div class="form-container table-container language-table sortable-table">
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Code' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Is Active' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Action' ) ); ?>
            </div>
            <?php foreach ( $this->LanguageArray as $language ) { ?>
                <div class="sortable-table-row filter-row filter-content">
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $language->Code ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $language->Number ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <div class="form-translation-list">
                            <?php foreach ( GetTranslationArray( $language->Text, DefaultLanguageCode ) as $translation ) { ?>
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
                        <?php echo htmlspecialchars( GetValueText( $language->IsActive ) ); ?>
                    </div>
                    <div class="form-centered sortable-table-cell">
                        <a class="form-button view-button" href="/admin/language/view/<?php echo htmlspecialchars( $language->Id ); ?>">
                        </a>
                        <?php if ( HasSessionMinimumUserRole( 'author' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/language/edit/<?php echo htmlspecialchars( $language->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/language/remove/<?php echo htmlspecialchars( $language->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-list is-hidden">
        <?php foreach ( $this->LanguageArray as $language ) { ?>
            <div class="card-container filter-row">
                <div class="card">
                    <div class="form-container" data-is-row data-table-name="LANGUAGE">
                        <div class="form-field-name" data-is-column-title data-column-name="Code">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Code' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Code">
                            <input-component class="form-component" result-name="Code" result-value="<?php echo htmlspecialchars( GetValueText( $language->Code ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Number">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Number">
                            <input-component class="form-component" result-name="Number" result-value="<?php echo htmlspecialchars( GetValueText( $language->Number ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Text">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Text">
                            <multilingual-input-component class="form-component" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $language->Text ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="IsActive">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Is Active' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="IsActive">
                            <dropdown-component class="form-component" result-name="IsActive" result-value="<?php echo htmlspecialchars( GetValueText( $language->IsActive ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ '0', '1' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'False', 'True' ] ) ) ); ?>"></dropdown-component>
                        </div>
                    </div>
                    <div class="form-toolbar">
                        <?php if ( HasSessionMinimumUserRole( 'author' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/language/edit/<?php echo htmlspecialchars( $language->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/language/remove/<?php echo htmlspecialchars( $language->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
