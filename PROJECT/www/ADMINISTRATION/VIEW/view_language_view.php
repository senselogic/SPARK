<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<div id="view-language-view">
    <div class="page-section form-section">
        <div class="form-container">
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetTextBySlug( 'Code' ) ); ?> :
            </div>
            <div>
                <input-component class_="form-input" name_="Code" type_="text" value_="<?php echo htmlspecialchars( GetValueText( $this->Language->Code ) ); ?>" readonly_></input-component>
            </div>
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
            </div>
            <div>
                <input-component class_="form-input" name_="Number" type_="text" value_="<?php echo htmlspecialchars( GetValueText( $this->Language->Number ) ); ?>" readonly_></input-component>
            </div>
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
            </div>
            <div>
                <input-component class_="form-input" name_="Text" type_="text" value_="<?php echo htmlspecialchars( GetValueText( $this->Language->Text ) ); ?>" readonly_ language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></input-component>
            </div>
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetTextBySlug( 'Is Active' ) ); ?> :
            </div>
            <div>
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
