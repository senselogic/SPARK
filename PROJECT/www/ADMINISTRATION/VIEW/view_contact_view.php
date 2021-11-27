<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<div id="view-contact-view">
    <div class="page-section form-section">
        <div class="form-container">
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetText_( 'Name' ) ); ?> :
            </div>
            <div>
                    <input class="form-input" name="Name" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->Contact->Name ) ); ?>" readonly/>
            </div>
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetText_( 'Company' ) ); ?> :
            </div>
            <div>
                    <input class="form-input" name="Company" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->Contact->Company ) ); ?>" readonly/>
            </div>
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetText_( 'Email' ) ); ?> :
            </div>
            <div>
                    <input class="form-input" name="Email" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->Contact->Email ) ); ?>" readonly/>
            </div>
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetText_( 'Phone' ) ); ?> :
            </div>
            <div>
                    <input class="form-input" name="Phone" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->Contact->Phone ) ); ?>" readonly/>
            </div>
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetText_( 'Subject' ) ); ?> :
            </div>
            <div>
                    <input class="form-input" name="Subject" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->Contact->Subject ) ); ?>" readonly/>
            </div>
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetText_( 'Message' ) ); ?> :
            </div>
            <div>
                    <textarea class="form-textarea" name="Message" readonly><?php echo htmlspecialchars( $this->Contact->Message ); ?></textarea>
            </div>
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetText_( 'Date Time' ) ); ?> :
            </div>
            <div>
                    <input class="form-input" name="DateTime" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->Contact->DateTime ) ); ?>" readonly/>
            </div>
            <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( $this->ListPage ); ?>">
            </a>
        </div>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
