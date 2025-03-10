<?php
/**
 * DOMPDF - PHP5 HTML to PDF renderer
 *
 * File: $RCSfile: frame_factory.cls.php,v $
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

/* $Id: frame_factory.cls.php 356 2011-01-28 08:56:10Z fabien.menager $ */

/**
 * Contains frame decorating logic
 *
 * This class is responsible for assigning the correct {@link Frame_Decorator},
 * {@link Positioner}, and {@link Frame_Reflower} objects to {@link Frame}
 * objects.  This is determined primarily by the Frame's display type, but
 * also by the Frame's node's type (e.g. DomElement vs. #text)
 *
 * @access private
 * @package dompdf
 */
class Frame_Factory {

  /**
   * Decorate the Frame
   * 
   * @param $root Frame The frame to decorate
   * @param $dompdf DOMPDF The dompdf instance
   */
  static function decorate_root(Frame $root, DOMPDF $dompdf) {
    $frame = new Page_Frame_Decorator($root, $dompdf);
    $frame->set_reflower( new Page_Frame_Reflower($frame) );
    $root->set_decorator($frame);
    return $frame;
  }

  /**
   * Decorate a Frame 
   * 
   * @param $root Frame The frame to decorate
   * @param $dompdf DOMPDF The dompdf instance
   * @return Frame_Decorator
   * FIXME: this is admittedly a little smelly...
   */ 
  static function decorate_frame(Frame $frame, DOMPDF $dompdf) {
    if ( is_null($dompdf) )
      throw new Exception("foo");
      
    $style = $frame->get_style();
    
    switch ($style->display) {
      
    case "block":
      $positioner = "Block";        
      $decorator = "Block";
      $reflower = "Block";
      break;
    
    case "inline-block":
      $positioner = "Inline";
      $decorator = "Block";
      $reflower = "Block";
      break;

    case "inline":
      $positioner = "Inline";
      if ( $frame->get_node()->nodeName === "#text" ) {
        $decorator = "Text";
        $reflower = "Text";
      } 
      else {
        if ( DOMPDF_ENABLE_CSS_FLOAT && $style->float !== "none" ) {
          $decorator = "Block";
          $reflower = "Block";
        }
        else {
          $decorator = "Inline";
          $reflower = "Inline";
        }
      }
      break;   

    case "table":
      $positioner = "Block";
      $decorator = "Table";
      $reflower = "Table";
      break;
      
    case "inline-table":
      $positioner = "Inline";
      $decorator = "Table";
      $reflower = "Table";
      break;

    case "table-row-group":
    case "table-header-group":
    case "table-footer-group":
      $positioner = "Null";
      $decorator = "Table_Row_Group";
      $reflower = "Table_Row_Group";
      break;
      
    case "table-row":
      $positioner = "Null";
      $decorator = "Table_Row";
      $reflower = "Table_Row";
      break;

    case "table-cell":
      $positioner = "Table_Cell";
      $decorator = "Table_Cell";
      $reflower = "Table_Cell";
      break;
        
    case "list-item":
      $positioner = "Block";
      $decorator  = "Block";
      $reflower   = "Block";
      break;

    case "-dompdf-list-bullet":
      if ( $style->list_style_position === "inside" )
        $positioner = "Inline";
      else        
        $positioner = "List_Bullet";

      if ( $style->list_style_image !== "none" )
        $decorator = "List_Bullet_Image";
      else
        $decorator = "List_Bullet";
      
      $reflower = "List_Bullet";
      break;

    case "-dompdf-image":
      $positioner = "Inline";
      $decorator = "Image";
      $reflower = "Image";
      break;
      
    case "-dompdf-br":
      $positioner = "Inline";
      $decorator = "Inline";
      $reflower = "Inline";
      break;

    default:
      // FIXME: should throw some sort of warning or something?
    case "none":
      $positioner = "Null";
      $decorator = "Null";
      $reflower = "Null";
      break;
    }

    $position = $style->position;
    
    if ( $position === "absolute" )
      $positioner = "Absolute";

    else if ( $position === "fixed" )
      $positioner = "Fixed";
  
    $positioner .= "_Positioner";
    $decorator .= "_Frame_Decorator";
    $reflower .= "_Frame_Reflower";

    $deco = new $decorator($frame, $dompdf);
    $deco->set_positioner( new $positioner($deco) );
    $reflow = new $reflower($deco);
    
    $deco->set_reflower( $reflow );
    
    return $deco;
  }
}
