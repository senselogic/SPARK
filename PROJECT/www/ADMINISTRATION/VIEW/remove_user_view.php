<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<div id="remove-user-view">
    <div class="page-section form-section">
        <form class="form-centered" action="/admin/user/remove/<?php echo htmlspecialchars( $this->User->Id ); ?>" method="post">
            <div class="form-container">
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Pseudonym' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Pseudonym" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $this->User->Pseudonym ) ); ?>" result-readonly></input-component>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Password' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Password" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $this->User->Password ) ); ?>" result-readonly></input-component>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Role' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Role" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $this->User->Role ) ); ?>" result-readonly></input-component>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Email' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Email" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $this->User->Email ) ); ?>" result-readonly></input-component>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" onclick="SetPriorUrl()">
                </a>
                <button class="justify-self-end form-button-large form-button form-button-large remove-button" type="submit">
                </button>
            </div>
        </form>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
