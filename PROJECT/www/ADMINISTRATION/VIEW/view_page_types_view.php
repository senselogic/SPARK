<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-page-types-view">
    <div class="form-limited form-centered margin-bottom-1rem">
        <div class="tool-container">
            <?php $filter_name = "PageTypeFilter"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/filter.php'; ?>
            <?php $list_mode_name = "PageTypeListMode"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/list_mode.php'; ?>
            <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                <a class="form-button form-button-large add-button" href="/admin/page-type/add">
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="cell-list page-section form-section is-hidden">
        <div class="form-container table-container page-type-table sortable-table">
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Name' ) ); ?>
            </div>
            <div class="form-column-name sortable-table-column">
                <?php echo htmlspecialchars( GetTextBySlug( 'Action' ) ); ?>
            </div>
            <?php foreach ( $this->PageTypeArray as $page_type ) { ?>
                <div class="sortable-table-row filter-row filter-content">
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page_type->Slug ) ); ?>
                    </div>
                    <div class="sortable-table-cell filter-cell">
                        <?php echo htmlspecialchars( GetValueText( $page_type->Name ) ); ?>
                    </div>
                    <div class="form-centered sortable-table-cell">
                        <a class="form-button view-button" href="/admin/page-type/view/<?php echo htmlspecialchars( $page_type->Id ); ?>">
                        </a>
                        <?php if ( HasSessionMinimumUserRole( 'author' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/page-type/edit/<?php echo htmlspecialchars( $page_type->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/page-type/remove/<?php echo htmlspecialchars( $page_type->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-list is-hidden">
        <?php foreach ( $this->PageTypeArray as $page_type ) { ?>
            <div class="card-container filter-row">
                <div class="card">
                    <div class="form-container" data-is-row data-table-name="PAGE_TYPE">
                        <div class="form-field-name" data-is-column-title data-column-name="Slug">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Slug">
                            <input-component class="form-component" result-name="Slug" result-value="<?php echo htmlspecialchars( GetValueText( $page_type->Slug ) ); ?>" is-readonly></input-component>
                        </div>
                        <div class="form-field-name" data-is-column-title data-column-name="Name">
                            <?php echo htmlspecialchars( GetTextBySlug( 'Name' ) ); ?> :
                        </div>
                        <div class="form-field-value" data-is-column-value data-column-name="Name">
                            <input-component class="form-component" result-name="Name" result-value="<?php echo htmlspecialchars( GetValueText( $page_type->Name ) ); ?>" is-readonly></input-component>
                        </div>
                    </div>
                    <div class="form-toolbar">
                        <?php if ( HasSessionMinimumUserRole( 'author' ) ) { ?>
                            <a class="form-button edit-button" href="/admin/page-type/edit/<?php echo htmlspecialchars( $page_type->Id ); ?>">
                            </a>
                        <?php } ?>
                        <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                            <a class="form-button remove-button" href="/admin/page-type/remove/<?php echo htmlspecialchars( $page_type->Id ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
