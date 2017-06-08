<?php

$config = [
    'admin_login'       =>  [
                                [
                                    'field' => 'email',
                                    'label' => 'Email',
                                    'rules' => 'required|valid_email|trim',
                                ],
                                [
                                    'field' => 'password',
                                    'label' => 'Password',
                                    'rules' => 'required',
                                ]
                            ],

    'register'          =>  [
                                [
                                    'field' => 'firstname',
                                    'label' => 'First Name',
                                    'rules' => 'required|alpha|trim',
                                ],
                                [
                                    'field' => 'lastname',
                                    'label' => 'Last Name',
                                    'rules' => 'required|alpha|trim',
                                ],
                                [
                                    'field' => 'email',
                                    'label' => 'Email',
                                    'rules' => 'required|trim|valid_email',
                                ],
                                [
                                    'field' => 'password',
                                    'label' => 'Password',
                                    'rules' => 'required',
                                ],
                                [
                                    'field' => 'passconf',
                                    'label' => 'Password confirm',
                                    'rules' => 'required|matches[password]',
                                ]

                            ],
    'add_article_rules' =>  [
                                [
                                    'field' => 'title',
                                    'label' => 'Naslov',
                                    'rules' => 'required'
                                ],
                            ]

];