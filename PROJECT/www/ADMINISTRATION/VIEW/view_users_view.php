<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<div id="view-users-view">
    <div class="form-limited form-centered margin-bottom-1rem">
        <div class="tool-container">
            <?php  $filter_name = "UserFilter"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/filter.php'; ?>
            <?php  $list_mode_name = "UserListMode"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/list_mode.php'; ?>
            <?php if ( HasSessionMinimumUserRole( 'editor' ) ) { ?>
                <a class="form-button form-button-large add-button" href="/admin/user/add">
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="cell-list page-section form-section is-hidden">
        <div class="form-container table-container user-table sortable-table">
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Email' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Pseudonym' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Password' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Role' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Action' ) ); ?>
            </div>
            <?php foreach ( $this->UserArray as  $user ) { ?>
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
                        <?php if ( HasSessionMinimumUserRole( 'editor' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/user/edit/<?php echo htmlspecialchars( $user->Id ); ?>">
                            </a>
                            <a class="form-button remove-button" href="/admin/user/remove/<?php echo htmlspecialchars( $user->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-list is-hidden">
        <?php foreach ( $this->UserArray as  $user ) { ?>
            <div class="card-container filter-row">
                <div class="card">
                    <div class="form-container">
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Email' ) ); ?> :
                        </div>
                        <div>
                                <input class="form-input" name="Email" type="text" value="<?php echo htmlspecialchars( GetValueText( $user->Email ) ); ?>" readonly/>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Pseudonym' ) ); ?> :
                        </div>
                        <div>
                                <input class="form-input" name="Pseudonym" type="text" value="<?php echo htmlspecialchars( GetValueText( $user->Pseudonym ) ); ?>" readonly/>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Password' ) ); ?> :
                        </div>
                        <div>
                                <input class="form-input" name="Password" type="text" value="<?php echo htmlspecialchars( GetValueText( $user->Password ) ); ?>" readonly/>
                        </div>
                        <div class="form-field-name">
                            <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Role' ) ); ?> :
                        </div>
                        <div>
                                <input class="form-input" name="Role" type="text" value="<?php echo htmlspecialchars( GetValueText( $user->Role ) ); ?>" readonly/>
                        </div>
                    </div>
                    <?php if ( HasSessionMinimumUserRole( 'editor' ) ) { ?>
                        <div class="form-toolbar">
                            <a class="form-button edit-button" href="/admin/user/edit/<?php echo htmlspecialchars( $user->Id ); ?>">
                            </a>
                            <a class="form-button remove-button" href="/admin/user/remove/<?php echo htmlspecialchars( $user->Id ); ?>">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
