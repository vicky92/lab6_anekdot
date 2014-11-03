<?php
return array(
    'guest' 		=> array(
        'type' 			=> CAuthItem::TYPE_ROLE,
        'description' 		=> 'Guest',
        'bizRule' 		=> null,
        'data' 			=> null
    ),

    'user' 			=> array(
        'type' 			=> CAuthItem::TYPE_ROLE,
        'description' 		=> 'User',
        'children' 		=> array( 'dnv_user', ),
        'bizRule' 		=> null,
        'data' 			=> null
    ),
    
    'admin' 		=> array(
        'type' 			=> CAuthItem::TYPE_ROLE,
        'description' 		=> 'Administrator',
        'children' 		=> array( 'moder', ),
        'bizRule' 		=> null,
        'data' 			=> null
    ),
);