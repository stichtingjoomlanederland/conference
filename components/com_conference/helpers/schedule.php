<?php
/*
 * @package		Conference Schedule Manager
 * @copyright	Copyright (c) 2013 Sander Potjer / sanderpotjer.nl
 * @license		GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Avatar display helper class
 */
class ConferenceHelperSchedule
{
	/**
	 * Uses the ATS plugins to fetch ana avatar for the user
	 * 
	 * @param JUser $user The user for which to fetch an avatar for
	 * @param int $size The size (in pixels), defaults to 64
	 * @return string The URL to the avatar image
	 */
	public static function slots($conference_day_id)
	{		
		$slots = FOFModel::getTmpInstance('Slots', 'ConferenceModel')
			->limit(0)
			->limitstart(0)
			->enabled(1)
			->day($conference_day_id)
			->filter_order('start_time')
			->filter_order_Dir('ASC')
			->getList();
					
		return $slots;
	}
	
	public static function rooms()
	{		
		$slots = FOFModel::getTmpInstance('Rooms', 'ConferenceModel')
			->limit(0)
			->limitstart(0)
			->enabled(1)
			->type(1)
			->filter_order('ordering')
			->filter_order_Dir('ASC')
			->getList();
					
		return $slots;
	}
	
	public static function generalroom()
	{		
		$generalroom = FOFModel::getTmpInstance('Rooms', 'ConferenceModel')
			->limit(1)
			->limitstart(0)
			->enabled(1)
			->type(0)
			->filter_order('ordering')
			->filter_order_Dir('ASC')
			->getList();
			
		$generalroom = $generalroom[0]->conference_room_id;
					
		return $generalroom;
	}
}