<?php
function datetime_format($date)
{
    if($date!='')
    {
        return date('F d, Y \a\t h:i a',strtotime($date));
    }
    return '';
}

function db_format_date($date)
{
    if($date!='')
    {
        return date('Y-m-d',strtotime($date));
    }
    return null;
}
function db_format_time($time)
{
    if($time!='')
    {
        return date('H:i',strtotime($time));
    }
    return null;
}
function format_date($date)
{
    if($date!='')
    {
        return date('F d, Y',strtotime($date));
    }
    return '';
}
