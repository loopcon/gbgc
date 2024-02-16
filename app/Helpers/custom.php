<?php

use App\Constant;
use Illuminate\Support\Facades\Auth;

function pagination($total_pages, $current_page, $page_link)
{
    $show_first_pages = 5;
    $show_last_pages = 5;
    if($total_pages <= 10) {
        $show_first_ellipsis = false;
        $show_last_ellipsis = false;
        $fStart = 0;
        $fEnd = 0;
        $mStart = 0;
        $mEnd = $total_pages;
        $lStart = 0;
        $lEnd = 0;
    } elseif($total_pages > $show_first_pages) {
        if($current_page < $show_first_pages) {
            $show_first_ellipsis = false;
            $show_last_ellipsis = true;
            $fStart = 0;
            $fEnd = 0;
            $mStart = 0;
            $mEnd = $show_first_pages;
            $lStart = $total_pages - 2;
            $lEnd = $total_pages;
        } elseif($current_page >= $show_first_pages && $current_page <= $total_pages-$show_last_pages) {
            $show_first_ellipsis = true;
            $show_last_ellipsis = true;
            $fStart = 0;
            $fEnd = 2;
            $mStart = $current_page - 2;
            $mEnd = $current_page + 1;
            $lStart = $total_pages - 2;
            $lEnd = $total_pages;
        } else {
            $show_first_ellipsis = true;
            $show_last_ellipsis = false;
            $fStart = 0;
            $fEnd = 2;
            $mStart = $total_pages - $show_last_pages;
            $mEnd = $total_pages;
            $lStart = 0;
            $lEnd = 0;
        }
    } else {
        $show_first_ellipsis = false;
        $show_last_ellipsis = false;
        $fStart = 0;
        $fEnd = 0;
        $mStart = 0;
        $mEnd = $total_pages;
        $lStart = 0;
        $lEnd = 0;
    }

    $page_html = "<ul class='pagination'>";
    if($current_page==1) {
        $page_html .= "<li class='page-item disabled' aria-disabled='true' aria-label='« Previous'>
                            <span class='page-link' aria-hidden='true'>‹</span>
                        </li>";
    } else {
        $page_html .= "<li class='page-item'><a class='page-link' href='".route('frontreportlist',$current_page-1)."' rel='prev' aria-label='« Previous'>‹</a></li>";
    }
    if($show_first_ellipsis) {
        for($i=$fStart;$i<$fEnd;$i++) {
            $number = $i + 1;
            if($number==$current_page) {
                $page_html .= "<li class='active page-item'><span class='page-link'>".$number."</span></li>";
            } else {
                $page_html .= "<li class='page-item'><a class='page-link' href='".route('frontreportlist',$number)."' title='".$number."'>".$number."</a></li>";
            }
        }
        $page_html .= "<li class='page-item'><span class='page-link'><i class='fa-solid fa-ellipsis'></i></span></li>";
    }
    for($i=$mStart;$i<$mEnd;$i++) {
        $number = $i + 1;
        if($number==$current_page) {
            $page_html .= "<li class='active page-item'><span  class='page-link'>".$number."</span></li>";
        } else {
            $page_html .= "<li class='page-item'><a class='page-link' href='".route('frontreportlist',$number)."' title='".$number."'>".$number."</a></li>";
        }
    }
    if($show_last_ellipsis) {
        $page_html .= "<li class='page-item'><span class='page-link'><i class='fa-solid fa-ellipsis'></i></span></li>";
        for($i=$lStart;$i<$lEnd;$i++) {
            $number = $i + 1;
            if($number==$current_page) {
                $page_html .= "<li class='active page-item'><span class='page-link'>".$number."</span></li>";
            } else {
                $page_html .= "<li class='page-item'><a class='page-link' href='".route('frontreportlist',$number)."' title='".$number."'>".$number."</a></li>";
            }
        }
    }
    if($current_page==$total_pages) {
        $page_html .= "<li class='page-item disabled' aria-disabled='true' aria-label='Next »'>
                            <span class='page-link' aria-hidden='true'>›</span>
                        </li>";
    } else {
        $page_html .= "<li class='page-item'><a class='page-link' href='".route('frontreportlist',$current_page+1)."' title='".($current_page+1)."'>›</a></li>";
    }
    $page_html .= "</ul>";
    return $page_html;
}
