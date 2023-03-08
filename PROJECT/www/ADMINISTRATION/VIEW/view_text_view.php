<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-text-view">
    <div class="page-section form-section">
        <div class="form-container" data-is-row data-table-name="TEXT">
            <div class="form-field-name" data-is-column-title data-column-name="Slug">
                <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Slug">
                <input-component result-class="form-input" result-name="Slug" result-value="<?php echo htmlspecialchars( GetValueText( $this->Text->Slug ) ); ?>" is-readonly></input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Text">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Text">
                <multilingual-text-input-component container-class="form-multilingual-container" result-class="form-textarea" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $this->Text->Text ) ); ?>" is-readonly language-codes="<?php echo htmlspecialchars( GetJsonText( LanguageCodeArray ) ); ?>" language-names="<?php echo htmlspecialchars( GetJsonText( LanguageNameArray ) ); ?>"></multilingual-text-input-component>
            </div>
            <a class="justify-self-start form-button form-button-large cancel-button" onclick="SetPriorUrl()">
            </a>
        </div>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
