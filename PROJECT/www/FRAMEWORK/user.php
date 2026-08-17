<?php // -- VARIABLES

$UserRoleArray = [ 'guest', 'assistant', 'contributor', 'writer', 'author', 'publisher', 'publisher', 'supervisor', 'manager', 'director', 'administrator' ];

// -- FUNCTIONS

function SetUserRoleArray(
    array $user_role_array
    )
{
    global
        $UserRoleArray;

    $UserRoleArray = $user_role_array;
}

// ~~

function GetUserRoleIndex(
    string $user_role
    )
{
    global
        $UserRoleArray;

    $user_role_index = array_search( $user_role, $UserRoleArray, true );

    if ( $user_role_index === false )
    {
        return -1;
    }
    else
    {
        return $user_role_index;
    }
}

// ~~

function HasMinimumUserRole(
    string $user_role,
    string $minimum_user_role
    )
{
    return GetUserRoleIndex( $user_role ) >= GetUserRoleIndex( $minimum_user_role );
}

// ~~

function GetSessionUserRole(
    )
{
    return FindSessionValue( 'UserRole', '' );
}

// ~~

function HasSessionUserRole(
    string $session_user_role
    )
{
    return GetSessionUserRole() === $session_user_role;
}

// ~~

function HasSessionMinimumUserRole(
    string $minimum_user_role
    )
{
    return HasMinimumUserRole( GetSessionUserRole(), $minimum_user_role );
}
