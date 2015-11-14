<?

$lang = array();

$lang['action_subscribe'] = "subscribe to";
$lang['action_unsubscribe'] = "unsubscribe from";

$lang['web_status_text_sent'] = "A confirmation message has been sent to $email.\n";
$lang['web_status_text_error'] = "We're sorry, this email address seems to be invalid or it's not allowed to sign up for this list. Please check the address and try again or email $owner_email for assistance.\n";
$lang['web_subscribe_confirm_text'] = "Thank you, your subscription to $list_name has been confirmed. To unsubscribe at any time just enter your email address below.\n";

$lang['email_unsubscribe_subject'] = "Please confirm your unsubscribe request from $list_name";
$lang['email_subscribe_subject'] = "Please confirm your subscribe request to $list_name";
$lang['email_confirm_text'] = "";

$lang['email_user_subscribe_confirm_subject'] = "$list_name Subscription Confirmation";
$lang['email_user_unsubscribe_confirm_subject'] = "$list_name Unsubscription Confirmation";
$lang['email_user_subscribe_confirm_text'] = "Thank you for joining the $list_name list.";
$lang['email_user_unsubscribe_confirm_text'] = "Thank you, you have been unsubscribed from the $list_name list.";

$lang['email_owner_unsubscribe_subject'] = "$list_name unsubscription notice";
$lang['email_owner_subscribe_subject'] = "$list_name subscription notice";
$lang['email_owner_subscribe_text'] = "$email has subscribed to $list_name. There are now $count_confirmed[0] members subscribing to this list.";
$lang['email_owner_unsubscribe_text'] = "$email has unsubscribed from $list_name. There are now $count_confirmed[0] members subscribing to this list.";

$lang['web_error'] = "Error processing request. Please contact $owner_email for assistance.\n";

?>