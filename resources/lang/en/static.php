<?php
return [
    'sidebars' => array(
        'manage' => array(
            'manage'    => 'Dashboard',
            'settings'  => array(
                'title'    => 'Settings',
                'settings' => 'Settings website information',
                'admins'   => 'Account administration',
            ),
            'products' => array(
                'title'   => 'Produtcs',
                'creates' => 'Create Products',
                'litst'   => 'List products',
            ),
            'orders' => array(
                'title'   => 'Orders',
                'creates' => 'Create Orders',
                'list'    => 'List Orders',
            ),
            'posts'     => array(
                'title'    => 'Posts',
                'posts'    => 'All post',
                'creates'  => 'Posts new',
                'category' => 'Category',
                'tags'     => 'Tags'
            ),
            'medias'    => array(
                'title'   => 'Medias',
                'medias'  => 'Libraries Medias',
                'creates' => 'Uploads images'
            ),
            'pages'     => array(
                'title'  => 'Pages',
                'pages'  => 'All pages',
                'create' => 'Add new pages'
            ),
            'comments'  => 'Comments',
            'customers' => array(
                'title'     => 'Customers',
                'customers' => 'All customers',
                'creates'   => 'Add new customers'
            ),
            'email'     => array(
                'title'     => 'Email',
                'contact'   => 'Email Contact',
                'subscribe' => 'Email Subscribe'
            )
        )
    ),
    'manage' => array(
        'settings' => array(
            'settings' => array(
                'page_title'     => 'Information management website',
                'title_general'  => 'General information',
                'title_other'    => 'Other information',
                'title_email'    => 'Email information',
                'title_host'     => 'Configure the SMTP mail server to send',
                'title_personal' => 'Personal Information and Terms of Use',
            ),
            'admins' => array(

            )
        )
    )
];