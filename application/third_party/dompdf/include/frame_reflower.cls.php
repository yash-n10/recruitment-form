<?php
/**
 * DOMPDF - PHP5 HTML to PDF renderer
 *
 * File: $RCSfile: frame_reflower.cls.php,v $
 * Created on: 2004-06-17
 *
 * Copyright (c) 2004 - Benj Carson <benjcarson@digitaljunkies.ca>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this library in the file LICENSE.LGPL; if not, write to the
 * Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
 * 02111-1307 USA
 *
 * Alternatively, you may distribute this software under the terms of the
 * PHP License, version 3.0 or later.  A copy of this license should have
 * been distributed with this file in the file LICENSE.PHP .  If this is not
 * the case, you can obtain a copy at http://www.php.net/license/3_0.txt.
 *
 * The latest version of DOMPDF might be available at:
 * http://www.dompdf.com/
 *
 * @link http://www.dompdf.com/
 * @copyright 2004 Benj Carson
 * @author Benj Carson <benjcarson@digitaljunkies.ca>
 * @package dompdf

 */

/* $Id: frame_reflower.cls.php 357 2011-01-30 20:56:46Z fabien.menager $ */

/**
 * Base reflower class
 *
 * Reflower objects are responsible for determining the width and height of
 * individual frames.  They also create line and page breaks as necessary.
 *
 * @access private
 * @package dompdf
 */
abstract class Frame_Reflower {

  /**
   * Frame for this reflower
   *
   * @var Frame
   */
  protected $_frame;

  /**
   * Cached min/max size
   *
   * @var array
   */
  protected $_min_max_cache;
  
  function __construct(Frame $frame) {
    $this->_frame = $frame;
    $this->_min_max_cache = null;
  }

  function dispose() {
    clear_object($this);
  }

  protected function _collapse_margins() {
    $cb = $this->_frame->get_containing_block();
    $style = $this->_frame->get_style();

    $t = $style->length_in_pt($style->margin_top, $cb["h"]);
    $b = $style->length_in_pt($style->margin_bottom, $cb["h"]);

    // Handle 'auto' values
    if ( $t === "auto" ) {
      $style->margin_top = "0pt";
      $t = 0;
    }

    if ( $b === "auto" ) {
      $style->margin_bottom = "0pt";
      $b = 0;
    }

    // Collapse vertical margins:
    $n = $this->_frame->get_next_sibling();
    
    // FIXME If there is a non-empty inline frame between the blocks, it is not taken into account
    while ( $n && !in_array($n->get_style()->display, Style::$BLOCK_TYPES) ) {
      $n = $n->get_next_sibling();
    }
    
    if ( $n ) { // && !$n instanceof Page_Frame_Decorator ) {
      $b = max($b, $style->length_in_pt($n->get_style()->margin_top, $cb["h"]));
      $n->get_style()->margin_top = "0pt";
      $style->margin_bottom = $b."pt";
    }

    // Collapse our first child's margin
    $f = $this->_frame->get_first_child();
    while ( $f && !in_array($f->get_style()->display, Style::$BLOCK_TYPES) )
      $f = $f->get_next_sibling();

    // Margin are collapsed only between block elements
    if ( $f && in_array($f->get_style()->display, Style::$BLOCK_TYPES)) {
      $t = max( $t, $style->length_in_pt($f->get_style()->margin_top, $cb["h"]));
      $style->margin_top = $t."pt";
      $f->get_style()->margin_bottom = "0pt";
    }

  }

  //........................................................................

  abstract function reflow(Frame_Decorator $block = null);

  //........................................................................

  // Required for table layout: Returns an array(0 => min, 1 => max, "min"
  // => min, "max" => max) of the minimum and maximum widths of this frame.
  // This provides a basic implementation.  Child classes should override
  // this if necessary.
  function get_min_max_width() {
    if ( !is_null($this->_min_max_cache) ) {
      return $this->_min_max_cache;
    }
    
    $style = $this->_frame->get_style();

    // Account for margins & padding
    $dims = array($style->padding_left,
                  $style->padding_right,
                  $style->border_left_width,
                  $style->border_right_width,
                  $style->margin_left,
                  $style->margin_right);

    $cb_w = $this->_frame->get_containing_block("w");
    $delta = $style->length_in_pt($dims, $cb_w);

    // Handle degenerate case
    if ( !$this->_frame->get_first_child() )
      return $this->_min_max_cache = array($delta, $delta,"min" => $delta, "max" => $delta);

    $low = array();
    $high = array();

    for ( $iter = $this->_frame->get_children()->getIterator();
          $iter->valid();
          $iter->next() ) {

      $inline_min = 0;
      $inline_max = 0;

      // Add all adjacent inline widths together to calculate max width
      while ( $iter->valid() && in_array( $iter->current()->get_style()->display, Style::$INLINE_TYPES ) ) {

        $child = $iter->current();

        $minmax = $child->get_min_max_width();

        if ( in_array( $iter->current()->get_style()->white_space, array("pre", "nowrap") ) )
          $inline_min += $minmax["min"];
        else
          $low[] = $minmax["min"];

        $inline_max += $minmax["max"];
        $iter->next();

      }

      if ( $inline_max > 0 )
        $high[] = $inline_max;

      if ( $inline_min > 0 )
        $low[] = $inline_min;

      if ( $iter->valid() ) {
        list($low[], $high[]) = $iter->current()->get_min_max_width();
        continue;
      }

    }
    $min = count($low) ? max($low) : 0;
    $max = count($high) ? max($high) : 0;

    // Use specified width if it is greater than the minimum defined by the
    // content.  If the width is a percentage ignore it for now.
    $width = $style->width;
    if ( $width !== "auto" && !is_percent($width) ) {
      $width = $style->length_in_pt($width, $cb_w);
      if ( $min < $width )
        $min = $width;
      if ( $max < $width )
        $max = $width;
    }

    $min += $delta;
    $max += $delta;
    return $this->_min_max_cache = array($min, $max, "min"=>$min, "max"=>$max);
  }

  /**
   * Parses a CSS string containing quotes and escaped hex characters
   * 
   * @param $string string The CSS string to parse
   * @param $single_trim
   * @return string
   */
  protected function _parse_string($string, $single_trim = false) {
    if ($single_trim) {
      $string = preg_replace("/^[\"\']/", "", $string);
      $string = preg_replace("/[\"\']$/", "", $string);
    }
    else {
      $string = trim($string, "'\"");
    }
    
    $string = str_replace(array("\\\n",'\\"',"\\'"),
                          array("",'"',"'"), $string);

    // Convert escaped hex characters into ascii characters (e.g. \A => newline)
    $string = preg_replace_callback("/\\\\([0-9a-fA-F]{0,6})(\s)?(?(2)|(?=[^0-9a-fA-F]))/",
                                    create_function('$matches',
                                                    'return chr(hexdec($matches[1]));'),
                                    $string);
    return $string;
  }
  
  /**
   * Parses a CSS "quotes" property
   * 
   * @return array An array of pairs of quotes
   */
  protected function _parse_quotes() {
    
    // Matches quote types
    $re = "/(\'[^\']*\')|(\"[^\"]*\")/";
    
    $quotes = $this->_frame->get_style()->quotes;
      
    // split on spaces, except within quotes
    if (!preg_match_all($re, "$quotes", $matches, PREG_SET_ORDER))
      return;
      
    $quotes_array = array();
    foreach($matches as &$_quote){
      $quotes_array[] = $this->_parse_string($_quote[0], true);
    }
    
    if ( empty($quotes_array) ) {
      $quotes_array = array('"', '"');
    }
    
    return array_chunk($quotes_array, 2);
  }

  /**
   * Parses the CSS "content" property
   * 
   * @return string The resulting string
   */
  protected function _parse_content() {

    // Matches generated content
    $re = "/\n".
      "\s(counters?\\([^)]*\\))|\n".
      "\A(counters?\\([^)]*\\))|\n".
      "\s([\"']) ( (?:[^\"']|\\\\[\"'])+ )(?<!\\\\)\\3|\n".
      "\A([\"']) ( (?:[^\"']|\\\\[\"'])+ )(?<!\\\\)\\5|\n" .
      "\s([^\s\"']+)|\n" .
      "\A([^\s\"']+)\n".
      "/xi";
    
    $content = $this->_frame->get_style()->content;

    $quotes = $this->_parse_quotes();
    
    // split on spaces, except within quotes
    if (!preg_match_all($re, $content, $matches, PREG_SET_ORDER))
      return;
      
    $text = "";

    foreach ($matches as $match) {
      
      if ( isset($match[2]) && $match[2] !== "" )
        $match[1] = $match[2];

      if ( isset($match[6]) && $match[6] !== "" )
        $match[4] = $match[6];

      if ( isset($match[8]) && $match[8] !== "" )
        $match[7] = $match[8];

      if ( isset($match[1]) && $match[1] !== "" ) {
        
        // counters?(...)
        $match[1] = mb_strtolower(trim($match[1]));

        // Handle counter() references:
        // http://www.w3.org/TR/CSS21/generate.html#content

        $i = mb_strpos($match[1], ")");
        if ( $i === false )
          continue;

        $args = explode(",", mb_substr($match[1], 8, $i - 8));
        $counter_id = $args[0];

        if ( $match[1][7] === "(" ) {
          // counter(name [,style])

          if ( isset($args[1]) )
            $type = trim($args[1]);
          else
            $type = null;

          $p = $this->_frame->find_block_parent();

          $text .= $p->counter_value($counter_id, $type);

        } else if ( $match[1][7] === "s" ) {
          // counters(name, string [,style])
          if ( isset($args[1]) )
            $string = $this->_parse_string(trim($args[1]));
          else
            $string = "";

          if ( isset($args[2]) )
            $type = $args[2];
          else
            $type = null;

          $p = $this->_frame->find_block_parent();
          $tmp = "";
          while ($p) {
            $tmp = $p->counter_value($counter_id, $type) . $string . $tmp;
            $p = $p->find_block_parent();
          }
          $text .= $tmp;

        } else
          // countertops?
          continue;

      } else if ( isset($match[4]) && $match[4] !== "" ) {
        // String match
        $text .= $this->_parse_string($match[4]);

      } else if ( isset($match[7]) && $match[7] !== "" ) {
        // Directive match

        if ( $match[7] === "open-quote" ) {
          // FIXME: do something here
          $text .= $quotes[0][0];
        } else if ( $match[7] === "close-quote" ) {
          // FIXME: do something else here
          $text .= $quotes[0][1];
        } else if ( $match[7] === "no-open-quote" ) {
          // FIXME:
        } else if ( $match[7] === "no-close-quote" ) {
          // FIXME:
        } else if ( mb_strpos($match[7],"attr(") === 0 ) {

          $i = mb_strpos($match[7],")");
          if ( $i === false )
            continue;

          $attr = mb_substr($match[7], 5, $i - 5);
          if ( $attr == "" )
            continue;
            
          $text .= $this->_frame->get_parent()->get_node()->getAttribute($attr);
        } else
          continue;
      }
    }

    return $text;
  }
  
  /**
   * Sets the generated content of a generated frame
   */
  protected function _set_content(){
    $frame = $this->_frame;
    $style = $frame->get_style();
  
    if ( $style->content && $frame->get_node()->nodeName === "dompdf_generated" ) {
      $content = $this->_parse_content();
      $node = $frame->get_node()->ownerDocument->createTextNode($content);
      
      $new_style = $style->get_stylesheet()->create_style();
      $new_style->inherit($style);
      
      $new_frame = new Frame($node);
      $new_frame->set_style($new_style);
      
      Frame_Factory::decorate_frame($new_frame, $frame->get_dompdf());
      $new_frame->get_decorator()->set_root($frame->get_root());
      $frame->append_child($new_frame);
    }
  }
}
