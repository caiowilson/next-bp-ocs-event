<?php  /*
 Plugin Name: NEXT OCS EVENT
Author: Caio Wilson
Description: plugin temporario para utilizaçao dos grupos do BP no OCS.
License: GPLv3

Copyright 2012  Caio Wilson  (email : caiowilson@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function conditional_group_template_change(){
	if(is_events_group() && $_GET['ocs'])
		{
			$changed_template = locate_template('home-group-limpo.php', true);
			load_template( $changed_template );
		}
}

add_action('bp_init','conditional_group_template_change');

if(!function_exists('is_events_group')){
	function is_events_group(){

		global $bp;

		$current_group_slug = $bp->groups->current_group->slug;

		if(strpos($current_group_slug, 'eventos') === false && strpos($current_group_slug, 'eventos') != 0)//o srtpos retorna o boolean false, mas quando acha na primeira posicao retorna 0 o que faz com que a bosta do if leia errado ainda que esteja com === :/
			return false;
		else
			return true;

	}
}




?>