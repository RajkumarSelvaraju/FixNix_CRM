<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/





global $modules_exempt_from_availability_check;
$modules_exempt_from_availability_check = array('Holidays'=>'Holidays',
												'Tasks'=>'Tasks',
												'Calls'=>'Calls',
												'Meetings'=>'Meetings',
												'History'=>'History',
												'Notes'=>'Notes',
												'Emails'=>'Emails',
												'ProjectTask'=>'ProjectTask',
												'Users'=>'Users',
											   );

$layout_defs['Project'] = array(
	// list of what Subpanels to show in the DetailView
	'subpanel_setup' => array(

       'projecttask' => array(
			'order' => 20,
			'sort_order' => 'asc',
			'sort_by' => 'project_task_id',
			'module' => 'ProjectTask',
			'top_buttons' => array(
				array('widget_class' => 'SubPanelTopCreateButton', ),
			),
			'subpanel_name' => 'default',
			'title_key' => 'LBL_PROJECT_TASKS_SUBPANEL_TITLE',
			'get_subpanel_data' => 'projecttask',
		),

		'activities' => array(
			'order' => 40,
			'sort_order' => 'desc',
			'sort_by' => 'date_start',
			'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
			'type' => 'collection',
			'subpanel_name' => 'activities',   //this values is not associated with a physical file.
			'module'=>'Activities',

			'top_buttons' => array(
				array('widget_class' => 'SubPanelTopCreateTaskButton'),
				array('widget_class' => 'SubPanelTopScheduleMeetingButton'),
				array('widget_class' => 'SubPanelTopScheduleCallButton'),
				array('widget_class' => 'SubPanelTopComposeEmailButton'),
			),

			'collection_list' => array(
				'meetings' => array(
					'module' => 'Meetings',
					'subpanel_name' => 'ForActivities',
					'get_subpanel_data' => 'meetings',
				),
				'tasks' => array(
					'module' => 'Tasks',
					'subpanel_name' => 'ForActivities',
					'get_subpanel_data' => 'tasks',
				),
				'calls' => array(
					'module' => 'Calls',
					'subpanel_name' => 'ForActivities',
					'get_subpanel_data' => 'calls',
				),
			),
		),

		'history' => array(
			'order' => 50,
			'sort_order' => 'desc',
			'sort_by' => 'date_entered',
			'title_key' => 'LBL_HISTORY_SUBPANEL_TITLE',
			'type' => 'collection',
			'subpanel_name' => 'history',   //this values is not associated with a physical file.
			'module'=>'History',

			'top_buttons' => array(
			array('widget_class' => 'SubPanelTopCreateNoteButton'),
			array('widget_class' => 'SubPanelTopArchiveEmailButton'),
            array('widget_class' => 'SubPanelTopSummaryButton'),
			),

			'collection_list' => array(
				'meetings' => array(
					'module' => 'Meetings',
					'subpanel_name' => 'ForHistory',
					'get_subpanel_data' => 'meetings',
				),
				'calls' => array(
					'module' => 'Calls',
					'subpanel_name' => 'ForHistory',
					'get_subpanel_data' => 'calls',
				),
				'tasks' => array(
					'module' => 'Tasks',
					'subpanel_name' => 'ForHistory',
					'get_subpanel_data' => 'tasks',
				),
				'notes' => array(
					'module' => 'Notes',
					'subpanel_name' => 'ForHistory',
					'get_subpanel_data' => 'notes',
				),
				'emails' => array(
					'module' => 'Emails',
					'subpanel_name' => 'ForHistory',
					'get_subpanel_data' => 'emails',
				),
			)
		),
        'contacts' => array(
            'top_buttons' => array(
			    array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Contacts'),
	         ),
			'order' => 60,
			'module' => 'Contacts',
			'sort_order' => 'asc',
			'sort_by' => 'last_name, first_name',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'contacts',
			'add_subpanel_data' => 'contact_id',
			'title_key' => 'LBL_CONTACTS_SUBPANEL_TITLE',
		),

      'accounts' => array(
            'top_buttons' => array(
			    array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Accounts'),
	         ),
			'order' => 70,
			'module' => 'Accounts',
			'sort_order' => 'asc',
			'sort_by' => 'name',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'accounts',
			'add_subpanel_data' => 'account_id',
			'title_key' => 'LBL_ACCOUNTS_SUBPANEL_TITLE',
		),
		'opportunities' => array(
            'top_buttons' => array(
			    array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Opportunities'),
	         ),
			'order' => 80,
			'module' => 'Opportunities',
			'sort_order' => 'desc',
			'sort_by' => 'date_closed',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'opportunities',
			'add_subpanel_data' => 'opportunity_id',
			'title_key' => 'LBL_OPPORTUNITIES_SUBPANEL_TITLE',
		),
        'cases' => array(
            'top_buttons' => array(
                array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Cases'),
             ),
            'order' => 110,
            'module' => 'Cases',
            'sort_order' => 'desc',
            'sort_by' => 'case_number',
            'subpanel_name' => 'default',
            'get_subpanel_data' => 'cases',
            'add_subpanel_data' => 'case_id',
            'title_key' => 'LBL_CASES_SUBPANEL_TITLE',
        ),
        'bugs' => array(
            'top_buttons' => array(
                array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Bugs'),
             ),
            'order' => 120,
            'module' => 'Bugs',
            'sort_order' => 'desc',
            'sort_by' => 'bug_number',
            'subpanel_name' => 'default',
            'get_subpanel_data' => 'bugs',
            'add_subpanel_data' => 'bug_id',
            'title_key' => 'LBL_BUGS_SUBPANEL_TITLE',
        ),
   ),
);
$layout_defs['ProjectTemplates'] = array(
	// list of what Subpanels to show in the DetailView
	'subpanel_setup' => array(
       'projecttask' => array(
			'top_buttons' => array(
				array('widget_class' => 'SubPanelEditProjectTasksButton', ),
			),
			'order' => 10,
			'sort_order' => 'desc',
			'sort_by' => 'id',
			'module' => 'ProjectTask',
			'subpanel_name' => 'default',
			'title_key' => 'LBL_PROJECT_TASKS_SUBPANEL_TITLE',
			'get_subpanel_data' => 'projecttask',
		),

	),
);


?>