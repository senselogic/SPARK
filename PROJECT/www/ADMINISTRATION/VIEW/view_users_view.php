<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-users-view">
    <div class="form-limited form-centered margin-bottom-1rem">
        <div class="tool-container">
            <?php $filter_name = "UserFilter"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/filter.php'; ?>
            <?php $list_mode_name = "UserListMode"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/list_mode.php'; ?>
            <?php if ( HasSessionMinimumUserRole( 'administrator' ) ) { ?>
                <a class="form-button form-button-large add-button" href="/admin/user/add">
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="cell-list page-section form-section is-hidden">
        <div class="form-container table-container user-table sortable-table">
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Email' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Pseudonym' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Password' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Role' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Action' ) ); ?>
            </div>
            <?php foreach ( $this->UserArray as $user ) { ?>
                <div class="sortable-table-row filter-row filter-content">
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $user->Email ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $user->Pseudonym ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $user->Password ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $user->Role ) ); ?>
                    </div>
                    <div class="form-centered sortable-table-cell">
                        <a class="form-button view-button" href="/admin/user/view/<?php echo htmlspecialchars( $user->Id ); ?>">
                        </a>
                        <?php if ( HasSessionMinimumUserRole( 'administrator' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/user/edit/<?php echo htmlspecialchars( $user->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'administrator' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/user/remove/<?php echo htmlspecialchars( $user->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-list is-hidden">
        <?php foreach ( $this->UserArray as $user ) { ?>
            <div class="card-container filter-row">
                <div class="card">
                    <div class="form-container" data-is-row data-table-name="USER">
                        <div class="form-field-name" data-is-column-title data-column-name="Email">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Email' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Email">
                            <input-component class="form-component" result-name="Email" result-value="<?php echo htmlspecialchars( GetValueText( $user->Email ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Pseudonym">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Pseudonym' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Pseudonym">
                            <input-component class="form-component" result-name="Pseudonym" result-value="<?php echo htmlspecialchars( GetValueText( $user->Pseudonym ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Password">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Password' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Password">
                            <input-component class="form-component" result-name="Password" result-value="<?php echo htmlspecialchars( GetValueText( $user->Password ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Role">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Role' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Role">
                            <dropdown-component class="form-component" result-name="Role" result-value="<?php echo htmlspecialchars( GetValueText( $user->Role ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'guest', 'contributor', 'author', 'publisher', 'administrator' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Guest', 'Contributor', 'Author', 'Editor', 'Administrator' ] ) ) ); ?>"></dropdown-component>
                        </div>
                    </div>
                    <div class="form-toolbar">
                        <?php if ( HasSessionMinimumUserRole( 'administrator' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/user/edit/<?php echo htmlspecialchars( $user->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'administrator' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/user/remove/<?php echo htmlspecialchars( $user->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
