<?php

namespace App\Helper;

use Illuminate\Support\Facades\Auth;

class CommonHelper
{
    public static function getMenuList()
    {
        if (Auth::guest()) {
            $menuList = [
                // 註冊
                [
                    'id' => 'store_list',
                    'url' => 'register',
                    'content' => '註冊',
                    'option' => [],
                    'subItems' => [],
                ],
                // 登入
                [
                    'id' => 'store_list',
                    'url' => 'login',
                    'content' => '登入',
                    'option' => [],
                    'subItems' => [],
                ],
            ];
        } else {
            $menuList = [
                // 首頁
                [
                    'id' => 'home',
                    'url' => '',
                    'content' => '<i class="fa fa-fw fa-search"></i>首頁',
                    'option' => [],
                    'subItems' => [],
                ],
                // 訂餐管理
                [
                    'id' => 'order-manage',
                    'url' => '',
                    'content' => '<i class="fa fa-fw fa fa-question-circle"></i>訂餐管理',
                    'subItems' => [
                        //新增訂餐
                        [
                            'url' => '',
                            'content' => '新增訂餐',
                        ],
                        //新增訂餐
                        [
                            'url' => '',
                            'content' => '訂餐紀錄',
                        ],
                    ],
                ],
                // 帳戶管理
                [
                    'id' => 'account-manage',
                    'url' => '',
                    'content' => '帳戶管理',
                    'option' => [],
                    'subItems' => [
                        // 個人資訊
                        [
                            'url' => '',
                            'content' => '個人資訊',
                        ],
                        // 群組管理
                        [
                            'url' => '',
                            'content' => '群組管理',
                        ],
                        // 權限管理
                        [
                            'id' => 'store_list',
                            'url' => '',
                            'content' => '權限管理',
                            'subItems' => [],
                        ],
                    ],
                ],
                // 評價資訊
                [
                    'id' => 'store_list',
                    'url' => '',
                    'content' => '評價資訊',
                    'option' => [],
                    'subItems' => [],
                ],
                // 商家一覽
                [
                    'id' => 'store_list',
                    'url' => '',
                    'content' => '商家一覽',
                    'option' => [],
                    'subItems' => [],
                ],
//                // 儲值管理
//                [
//                    'id' => 'store_list',
//                    'url' => '',
//                    'content' => '儲值管理',
//                    'option' => [],
//                    'subItems' => [],
//                ],
                // 登出
                [
                    'id' => 'store_list',
                    'url' => '',
                    'content' => '登出',
                    'option' => [
                        'onclick' => 'javascript:$("#logout-form").submit();',
                    ],
                    'subItems' => [],
                ],
            ];
        }
        return $menuList;
    }
}
