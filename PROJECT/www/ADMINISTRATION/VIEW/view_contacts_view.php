<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-contacts-view">
    <div class="form-limited form-centered margin-bottom-1rem">
        <div class="tool-container">
            <?php $filter_name = "ContactFilter"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/filter.php'; ?>
            <?php $list_mode_name = "ContactListMode"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/list_mode.php'; ?>
            <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                <a class="form-button form-button-large add-button" href="/admin/contact/add">
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="cell-list page-section form-section is-hidden">
        <div class="form-container table-container contact-table sortable-table">
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Name' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Company' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Email' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Phone' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Subject' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Message' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Date Time' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Action' ) ); ?>
            </div>
            <?php foreach ( $this->ContactArray as $contact ) { ?>
                <div class="sortable-table-row filter-row filter-content">
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $contact->Name ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $contact->Company ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $contact->Email ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $contact->Phone ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $contact->Subject ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $contact->Message ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $contact->DateTime ) ); ?>
                    </div>
                    <div class="form-centered sortable-table-cell">
                        <a class="form-button view-button" href="/admin/contact/view/<?php echo htmlspecialchars( $contact->Id ); ?>">
                        </a>
                        <?php if ( HasSessionMinimumUserRole( 'author' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/contact/edit/<?php echo htmlspecialchars( $contact->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/contact/remove/<?php echo htmlspecialchars( $contact->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-list is-hidden">
        <?php foreach ( $this->ContactArray as $contact ) { ?>
            <div class="card-container filter-row">
                <div class="card">
                    <div class="form-container" data-is-row data-table-name="CONTACT">
                        <div class="form-field-name" data-is-column-title data-column-name="Name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Name' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Name">
                            <input-component class="form-component" result-name="Name" result-value="<?php echo htmlspecialchars( GetValueText( $contact->Name ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Company">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Company' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Company">
                            <input-component class="form-component" result-name="Company" result-value="<?php echo htmlspecialchars( GetValueText( $contact->Company ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Email">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Email' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Email">
                            <input-component class="form-component" result-name="Email" result-value="<?php echo htmlspecialchars( GetValueText( $contact->Email ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Phone">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Phone' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Phone">
                            <input-component class="form-component" result-name="Phone" result-value="<?php echo htmlspecialchars( GetValueText( $contact->Phone ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Subject">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Subject' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Subject">
                            <input-component class="form-component" result-name="Subject" result-value="<?php echo htmlspecialchars( GetValueText( $contact->Subject ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Message">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Message' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Message">
                            <text-input-component class="form-component" result-name="Message" result-value="<?php echo htmlspecialchars( GetValueText( $contact->Message ) ); ?>" is-readonly></text-input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="DateTime">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Date Time' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="DateTime">
                            <input-component class="form-component" result-name="DateTime" result-value="<?php echo htmlspecialchars( GetValueText( $contact->DateTime ) ); ?>" is-readonly></input-component>
                        </div>
                    </div>
                    <div class="form-toolbar">
                        <?php if ( HasSessionMinimumUserRole( 'author' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/contact/edit/<?php echo htmlspecialchars( $contact->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/contact/remove/<?php echo htmlspecialchars( $contact->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
