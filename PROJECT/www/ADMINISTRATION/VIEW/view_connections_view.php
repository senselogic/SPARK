<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-connections-view">
    <div class="form-limited form-centered margin-bottom-1rem">
        <div class="tool-container">
            <?php $filter_name = "ConnectionFilter"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/filter.php'; ?>
            <?php $list_mode_name = "ConnectionListMode"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/list_mode.php'; ?>
            <?php if ( HasSessionMinimumUserRole( 'administrator' ) ) { ?>
                <a class="form-button form-button-large add-button" href="/admin/connection/add">
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="cell-list page-section form-section is-hidden">
        <div class="form-container table-container connection-table sortable-table">
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Browser Address' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Date Time' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Is Failed' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Attempt Count' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Action' ) ); ?>
            </div>
            <?php foreach ( $this->ConnectionArray as $connection ) { ?>
                <div class="sortable-table-row filter-row filter-content">
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $connection->BrowserAddress ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $connection->DateTime ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $connection->IsFailed ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $connection->AttemptCount ) ); ?>
                    </div>
                    <div class="form-centered sortable-table-cell">
                        <a class="form-button view-button" href="/admin/connection/view/<?php echo htmlspecialchars( $connection->Id ); ?>">
                        </a>
                        <?php if ( HasSessionMinimumUserRole( 'administrator' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/connection/edit/<?php echo htmlspecialchars( $connection->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'administrator' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/connection/remove/<?php echo htmlspecialchars( $connection->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-list is-hidden">
        <?php foreach ( $this->ConnectionArray as $connection ) { ?>
            <div class="card-container filter-row">
                <div class="card">
                    <div class="form-container" data-is-row data-table-name="CONNECTION">
                        <div class="form-field-name" data-is-column-title data-column-name="BrowserAddress">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Browser Address' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="BrowserAddress">
                            <input-component class="form-component" result-name="BrowserAddress" result-value="<?php echo htmlspecialchars( GetValueText( $connection->BrowserAddress ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="DateTime">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Date Time' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="DateTime">
                            <input-component class="form-component" result-name="DateTime" result-value="<?php echo htmlspecialchars( GetValueText( $connection->DateTime ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="IsFailed">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Is Failed' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="IsFailed">
                            <dropdown-component class="form-component" result-name="IsFailed" result-value="<?php echo htmlspecialchars( GetValueText( $connection->IsFailed ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ '0', '1' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'False', 'True' ] ) ) ); ?>"></dropdown-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="AttemptCount">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Attempt Count' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="AttemptCount">
                            <input-component class="form-component" result-name="AttemptCount" result-value="<?php echo htmlspecialchars( GetValueText( $connection->AttemptCount ) ); ?>" is-readonly></input-component>
                        </div>
                    </div>
                    <div class="form-toolbar">
                        <?php if ( HasSessionMinimumUserRole( 'administrator' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/connection/edit/<?php echo htmlspecialchars( $connection->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'administrator' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/connection/remove/<?php echo htmlspecialchars( $connection->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
