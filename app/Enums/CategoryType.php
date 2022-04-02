<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CategoryType extends Enum
{
    const LEARNING =   0;
    const WORK =   1;
    const JOB_HUNTING = 2;
    const JOB_CHANGING = 3;
    const MARRIAGE_ACTIVITY = 4;
    const MARRIAGE = 5;
    const PREGNANCY = 6;
    const CHILDBIRTH = 7;
    const DIVORCE = 8;
    const BUY_HOUSE = 9;
    const RENOVATE = 10;
    const SECOND_BUSINESS = 11;
    const INVESTMENT = 12;
    const HOBBY = 13;
    
    public static function getDescription($value):string{
        
        if ($value === self::LEARNING) {
            return '学び';
        }
        if($value === self::WORK) {
            return '仕事';
        }
        if($value === self::JOB_HUNTING) {
            return '就職';
        }
        if($value === self::JOB_CHANGING) {
            return '転職';
        }
        if($value === self::MARRIAGE_ACTIVITY) {
            return '婚活';
        }
        if($value === self::MARRIAGE) {
            return '結婚';
        }
        if($value === self::PREGNANCY) {
            return '妊娠';
        }
        if($value === self::CHILDBIRTH) {
            return '出産';
        }
        if($value === self::DIVORCE) {
            return '離婚';
        }
        if($value === self::BUY_HOUSE) {
            return '住宅購入';
        }
        if($value === self::RENOVATE) {
            return 'リフォーム';
        }
        if($value === self::SECOND_BUSINESS) {
            return '副業';
        }
        if($value === self::INVESTMENT) {
            return '投資';
        }
        if($value === self::HOBBY) {
            return '趣味';
        }
        return parent::getDescription($value);
    }
    
    public static function getValue(string $key){
        
        if ($key === '学び') {
            return self::LEARNING;
        }
        if($key === '仕事') {
            return self::WORK;
        }
        if($key === '就職') {
            return self::JOB_HUNTING;
        }
        if($key === '転職') {
            return self::JOB_CHANGING;
        }
        if($key === '婚活') {
            return self::MARRIAGE_ACTIVITY;
        }
        if($key === '結婚') {
            return self::MARRIAGE;
        }
        if($key === self::PREGNANCY) {
            return '妊娠';
        }
        if($key === '出産') {
            return self::CHILDBIRTH;
        }
        if($key === '離婚') {
            return self::DIVORCE;
        }
        if($key === '住宅購入') {
            return self::BUY_HOUSE;
        }
        if($key === self::Renovate) {
            return 'リフォーム';
        }
        if($key === self::SECOND_BUSINESS) {
            return '副業';
        }
        if($key === '投資') {
            return self::INVESTMENT;
        }
        if($key === '趣味') {
            return self::HOBBY;
        }
        return parent::getValue($key);
    }
    
}
