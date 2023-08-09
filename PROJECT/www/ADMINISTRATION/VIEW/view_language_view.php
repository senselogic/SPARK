<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-language-view">
    <div class="page-section form-section">
        <div class="form-container" data-is-row data-table-name="LANGUAGE"><~false<>
            <?php
                 $field_mode = 'view';
                 $field_name = 'Code';
                 $field_title = 'Code';
                 $field_value = $this->Language->Code;
                require __DIR__ . '/' . 'BLOCK/language_code_field.php';
            ?><>
            <div class="form-field-name" data-is-column-title data-column-name="Code">
                <?php echo htmlspecialchars( GetTextBySlug( 'Code' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Code">
                <input-component class="form-component" result-name="Code" result-value="<?php echo htmlspecialchars( GetValueText( $this->Language->Code ) ); ?>" is-readonly></input-component>
            </div><~false<>
            <?php
                 $field_mode = 'view';
                 $field_name = 'Number';
                 $field_title = 'Number';
                 $field_value = $this->Language->Number;
                require __DIR__ . '/' . 'BLOCK/language_number_field.php';
            ?><>
            <div class="form-field-name" data-is-column-title data-column-name="Number">
                <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Number">
                <input-component class="form-component" result-name="Number" result-value="<?php echo htmlspecialchars( GetValueText( $this->Language->Number ) ); ?>" is-readonly></input-component>
            </div><~false<>
            <?php
                 $field_mode = 'view';
                 $field_name = 'Text';
                 $field_title = 'Text';
                 $field_value = $this->Language->Text;
                require __DIR__ . '/' . 'BLOCK/language_text_field.php';
            ?><>
            <div class="form-field-name" data-is-column-title data-column-name="Text">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Text">
                <multilingual-input-component class="form-component" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $this->Language->Text ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-input-component>
            </div><~false<>
            <?php
                 $field_mode = 'view';
                 $field_name = 'IsActive';
                 $field_title = 'Is Active';
                 $field_value = $this->Language->IsActive;
                require __DIR__ . '/' . 'BLOCK/language_is_active_field.php';
            ?><>
            <div class="form-field-name" data-is-column-title data-column-name="IsActive">
                <?php echo htmlspecialchars( GetTextBySlug( 'Is Active' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="IsActive">
                <dropdown-component class="form-component" result-name="IsActive" result-value="<?php echo htmlspecialchars( GetValueText( $this->Language->IsActive ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ '0', '1' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'False', 'True' ] ) ) ); ?>"></dropdown-component>
            </div>
            <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( GetParentRoute( null, '/admin/language' ) ); ?>">
            </a>
        </div>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
