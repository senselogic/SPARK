call define.bat
call clean.bat
mkdir CODE\FRAMEWORK\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\CONTROLLER\connect_user_controller.phx CODE\ADMINISTRATION\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\CONTROLLER\controller.phx CODE\ADMINISTRATION\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\CONTROLLER\delete_file_controller.phx CODE\ADMINISTRATION\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\CONTROLLER\disconnect_user_controller.phx CODE\ADMINISTRATION\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\CONTROLLER\do_connect_user_controller.phx CODE\ADMINISTRATION\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\CONTROLLER\show_home_menu_controller.phx CODE\ADMINISTRATION\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\CONTROLLER\upload_document_controller.phx CODE\ADMINISTRATION\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\CONTROLLER\upload_image_controller.phx CODE\ADMINISTRATION\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\CONTROLLER\upload_video_controller.phx CODE\ADMINISTRATION\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\STYLE\base.styl CODE\ADMINISTRATION\STYLE\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\VIEW\connect_user_view.pht CODE\ADMINISTRATION\VIEW\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\VIEW\BLOCK\filter.pht CODE\ADMINISTRATION\VIEW\BLOCK\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\VIEW\BLOCK\list_mode.pht CODE\ADMINISTRATION\VIEW\BLOCK\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\VIEW\BLOCK\page_body.pht CODE\ADMINISTRATION\VIEW\BLOCK\
copy %TOOL%\SPARK\PROJECT\CODE\ADMINISTRATION\VIEW\BLOCK\page_footer.pht CODE\ADMINISTRATION\VIEW\BLOCK\
copy %TOOL%\SPARK\PROJECT\CODE\CONTROLLER\controller.phx CODE\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\CONTROLLER\get_captcha_image_controller.phx CODE\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\CONTROLLER\show_error_controller.phx CODE\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\CONTROLLER\view_controller.phx CODE\CONTROLLER\
copy %TOOL%\SPARK\PROJECT\CODE\FRAMEWORK\*.* CODE\FRAMEWORK\
copy %TOOL%\SPARK\PROJECT\CODE\MODEL\text_model.phx CODE\MODEL\
copy %TOOL%\SPARK\PROJECT\CODE\MODEL\user_model.phx CODE\MODEL\
copy %TOOL%\SPARK\PROJECT\CODE\VIEW\show_error_view.pht CODE\VIEW\
copy %TOOL%\SPARK\PROJECT\DATABASE\administration.bt DATABASE\
copy %TOOL%\SPARK\PROJECT\DATABASE\api.bt DATABASE\
mkdir CODE\STYLE\VISTA\
copy %TOOL%\VISTA\CODE\STYLUS\*.* CODE\STYLE\VISTA\
mkdir www\static\script\
copy %TOOL%\VISTA\CODE\JAVASCRIPT\*.* www\static\script\
