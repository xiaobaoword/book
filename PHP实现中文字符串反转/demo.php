<?php
/*
 知识点总结：

 先看看字符与字节有什么区别：

（一）“字节”的定义

    字节（Byte）是一种计量单位，表示数据量多少，它是计算机信息技术用于计量存储容量的一种计量单位。

（二）“字符”的定义

    字符是指计算机中使用的文字和符号，比如1、2、3、A、B、C、~！·#￥%……—*（）——+、等等。

    数字、字母等符号都是字符，字符只占一个字节，汉字占两个（UTF-8）

 (三) 不同的编码格式下字符占用的字节时不同的：

    ANSI 中文字符2、英文字符1字节
    UTF-8 中文字符3、英文字符1字节
    Unicode 中文字符2、英文字符2字节
*/

$str = "123456 中文";

/**
 * 方法一
 * 字符串反转
 * @param $str
 * @return string
 */
function fanzhuan1($str)
{
    $new_str = '';
    for ($i = 0; $i < mb_strlen($str); $i++) {
        // 负数从末尾截取，拼接字符串
        $new_str .= mb_substr($str, -($i + 1), 1);
    }

    // OR

    for ($i = mb_strlen($str) - 1; $i >= 0; $i--) {
        // 正数从末尾截取，拼接字符串
        $new_str .= mb_substr($str, $i, 1);
    }
    return $new_str;
}

/**
 * 方法二
 * 字符串转数组反转
 * @param $str
 * @return string
 */
function fanzhuan2($str)
{

    $arr = [];
    // 将字符串存入数组
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $arr[] = mb_substr($str, $i, 1);
    }

    // 反转字符串
    krsort($arr);

    // 拼接字符串
    $new_str = implode($arr);
    return $new_str;
}

echo fanzhuan1($str);
echo fanzhuan2($str);