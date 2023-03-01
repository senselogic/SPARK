<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-language-view">
    <div class="page-section form-section">
        <div class="form-container" data-is-row data-table-name="LANGUAGE">
            <div class="form-field-name" data-is-column-title data-column-name="Code">
                <?php echo htmlspecialchars( GetTextBySlug( 'Code' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Code">
                <input-component result-class="form-input" result-name="Code" result-value="<?php echo htmlspecialchars( GetValueText( $this->Language->Code ) ); ?>" is-readonly></input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Number">
                <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Number">
                <input-component result-class="form-input" result-name="Number" result-value="<?php echo htmlspecialchars( GetValueText( $this->Language->Number ) ); ?>" is-readonly></input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Text">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Text">
                <multilingual-input-component container-class="form-multilingual-container" result-class="form-input" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $this->Language->Text ) ); ?>" is-readonly language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="IsActive">
                <?php echo htmlspecialchars( GetTextBySlug( 'Is Active' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="IsActive">
                <select class="form-select" name="IsActive" readonly>
                    <option value="0"<?php if ( $this->Language->IsActive === '0' ) echo ' selected'; ?>>False</option>
                    <option value="1"<?php if ( $this->Language->IsActive === '1' ) echo ' selected'; ?>>True</option>
                </select>
            </div>
            <a class="justify-self-start form-button form-button-large cancel-button" onclick="SetPriorUrl()">
            </a>
        </div>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
