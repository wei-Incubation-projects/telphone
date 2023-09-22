<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = AdminMenu::create([
            'name' => 'Admin',
            'title' => '权限管理',
            'url' => 'administrator',
            'path' => '/admin',
            'icon' => '',
            'pid' => 0,
            'type' => 0,
        ]);
        $user = AdminMenu::create([
            'name' => 'AdminUser',
            'title' => '用户管理',
            'url' => 'administrator/user',
            'path' => 'user',
            'icon' => '',
            'pid' => $admin->id,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'AdminUserList',
                'title' => '用户列表',
                'url' => 'administrator/user/index',
                'path' => 'index',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserShow',
                'title' => '查看用户',
                'url' => 'administrator/user/display',
                'path' => 'show',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserAdd',
                'title' => '新增用户',
                'url' => 'administrator/user/create',
                'path' => 'create',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserMod',
                'title' => '修改用户',
                'url' => 'administrator/user/modify',
                'path' => 'modify',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserDel',
                'title' => '删除用户',
                'url' => 'administrator/user/delete',
                'path' => 'delete',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
        ]);

        $role = AdminMenu::create([
            'name' => 'AdminRole',
            'title' => '角色管理',
            'url' => 'administrator/role',
            'path' => 'role',
            'icon' => '',
            'pid' => $admin->id,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'AdminRoleList',
                'title' => '角色列表',
                'url' => 'administrator/role/index',
                'path' => 'index',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleShow',
                'title' => '查看角色',
                'url' => 'administrator/role/display',
                'path' => 'show',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleAdd',
                'title' => '新增角色',
                'url' => 'administrator/role/create',
                'path' => 'create',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleMod',
                'title' => '修改角色',
                'url' => 'administrator/role/modify',
                'path' => 'modify',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleDel',
                'title' => '删除角色',
                'url' => 'administrator/role/delete',
                'path' => 'delete',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
        ]);

        $menu = AdminMenu::create([
            'name' => 'AdminMenu',
            'title' => '菜单管理',
            'url' => 'administrator/menu',
            'path' => 'menu',
            'icon' => '',
            'pid' => $admin->id,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'AdminMenuList',
                'title' => '菜单列表',
                'url' => 'administrator/menu/index',
                'path' => 'index',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuShow',
                'title' => '查看菜单',
                'url' => 'administrator/menu/display',
                'path' => 'show',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuAdd',
                'title' => '新增菜单',
                'url' => 'administrator/menu/create',
                'path' => 'create',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuMod',
                'title' => '修改菜单',
                'url' => 'administrator/menu/modify',
                'path' => 'modify',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuDel',
                'title' => '删除菜单',
                'url' => 'administrator/menu/delete',
                'path' => 'delete',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
        ]);

        $phone = AdminMenu::create([
            'name' => 'Phone',
            'title' => '电话',
            'url' => 'phone',
            'path' => '/phone',
            'icon' => '',
            'pid' => 0,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'PhoneList',
                'title' => '电话列表',
                'url' => 'phone/index',
                'path' => 'index',
                'icon' => '',
                'pid' => $phone->id,
                'type' => 2,
            ],
            [
                'name' => 'PhoneShow',
                'title' => '电话菜单',
                'url' => 'phone/display',
                'path' => 'show',
                'icon' => '',
                'pid' => $phone->id,
                'type' => 2,
            ],
            [
                'name' => 'PhoneAdd',
                'title' => '新增电话',
                'url' => 'phone/create',
                'path' => 'create',
                'icon' => '',
                'pid' => $phone->id,
                'type' => 2,
            ],
            [
                'name' => 'PhoneMod',
                'title' => '修改电话',
                'url' => 'phone/modify',
                'path' => 'modify',
                'icon' => '',
                'pid' => $phone->id,
                'type' => 2,
            ],
            [
                'name' => 'PhoneDel',
                'title' => '删除电话',
                'url' => 'phone/delete',
                'path' => 'delete',
                'icon' => '',
                'pid' => $phone->id,
                'type' => 2,
            ],
            [
                'name' => 'PhoneUp',
                'title' => '上传电话',
                'url' => 'phone/upload',
                'path' => 'upload',
                'icon' => '',
                'pid' => $phone->id,
                'type' => 2,
            ],
        ]);

        $member = AdminMenu::create([
            'name' => 'Member',
            'title' => '会员',
            'url' => 'member',
            'path' => '/member',
            'icon' => '',
            'pid' => 0,
            'type' => 0,
        ]);
        $user = AdminMenu::create([
            'name' => 'MemberUser',
            'title' => '会员管理',
            'url' => 'member/user',
            'path' => 'user',
            'icon' => '',
            'pid' => $member->id,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'PhoneList',
                'title' => '会员列表',
                'url' => 'member/user/index',
                'path' => 'index',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'PhoneShow',
                'title' => '显示会员',
                'url' => 'member/user/display',
                'path' => 'show',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'PhoneAdd',
                'title' => '新增会员',
                'url' => 'member/user/create',
                'path' => 'create',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'PhoneMod',
                'title' => '修改会员',
                'url' => 'member/user/modify',
                'path' => 'modify',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'PhoneDel',
                'title' => '删除会员',
                'url' => 'member/user/delete',
                'path' => 'delete',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
        ]);
        $tel = AdminMenu::create([
            'name' => 'MemberPhone',
            'title' => '号码薄',
            'url' => 'member/phone',
            'path' => 'phone',
            'icon' => '',
            'pid' => $member->id,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'MemberPhoneList',
                'title' => '号码列表',
                'url' => 'member/phone/index',
                'path' => 'index',
                'icon' => '',
                'pid' => $tel->id,
                'type' => 2,
            ],
            [
                'name' => 'MemberPhoneShow',
                'title' => '显示号码',
                'url' => 'member/phone/display',
                'path' => 'show',
                'icon' => '',
                'pid' => $tel->id,
                'type' => 2,
            ],
            [
                'name' => 'MemberPhoneAdd',
                'title' => '新增号码',
                'url' => 'member/phone/create',
                'path' => 'create',
                'icon' => '',
                'pid' => $tel->id,
                'type' => 2,
            ],
            [
                'name' => 'MemberPhoneMod',
                'title' => '修改号码',
                'url' => 'member/phone/modify',
                'path' => 'modify',
                'icon' => '',
                'pid' => $tel->id,
                'type' => 2,
            ],
            [
                'name' => 'MemberPhoneDel',
                'title' => '删除号码',
                'url' => 'member/phone/delete',
                'path' => 'delete',
                'icon' => '',
                'pid' => $tel->id,
                'type' => 2,
            ],
        ]);
    }
}
