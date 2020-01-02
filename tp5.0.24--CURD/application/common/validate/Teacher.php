<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2019/12/11
 * Time: 19:39
 */

namespace app\common\validate;


use think\Validate;

class Teacher extends Validate
{
    protected $rule=[
        'email'=>'email',
        'name'=>[
            'chsAlpha',
            'length:2,6'
        ]
    ];

}