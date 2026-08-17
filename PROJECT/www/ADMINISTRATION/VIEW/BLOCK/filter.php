<div class="filter-container">
    <input id="filter-input" class="filter-input" type="text" placeholder="Search"/>
    <img class="form-button view-button filter-apply-button" onclick="ApplyFilter()"/>
</div>
<script>
    // -- FUNCTIONS

    function ApplyFilter(
        )
    {
        var
            filter_expression;

        filter = GetElement( "#filter-input" ).value;
        SetSessionValue( "<?php echo $filter_name; ?>", filter );

        GetElements( ".filter-row" ).Iterate(
            function (
                filter_row_element
                )
            {
                var
                    filter_row_element_text;

                filter_row_element_text = "";
                filter_row_element.GetElements( ".filter-cell" ).Iterate(
                    function (
                        filter_cell_element
                        )
                    {
                        filter_row_element_text += filter_cell_element.textContent;
                        filter_row_element_text += "\n";
                    }
                    );

                filter_row_element.GetElements( "input, textarea, select" ).Iterate(
                    function (
                        input_element
                        )
                    {
                        filter_row_element_text += input_element.value;
                        filter_row_element_text += "\n";
                    }
                    );

                filter_row_element.ToggleClass(
                    "is-hidden",
                    !filter_row_element_text.MatchesFilterExpression( filter )
                    );
            }
            );
    }

    // -- STATEMENTS

    var
        filter;

    filter = GetSessionValue( "<?php echo $filter_name; ?>" );

    if ( filter )
    {
        GetElement( "#filter-input" ).value = filter;
    }

    GetElement( "#filter-input" ).AddEventListener(
        "keyup",
        function (
            event
            )
        {
            if ( event.keyCode === 13 )
            {
                ApplyFilter();
            }
        }
        );

    DelayCall( ApplyFilter );
</script>
