<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Display site related graphic events charts.
 *
 * @package    report_newplugin
 * @copyright  2015 Simey Lameze <simey@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->dirroot . '/course/lib.php');

require_login();
admin_externalpage_setup('report_newplugin');
$context = context_system::instance();
require_capability('report/newplugin:view', $context);
$actionurl = new moodle_url('/report/newplugin/index.php');
$PAGE->set_context($context);
$PAGE->set_url('/report/newplugin/index.php');
$PAGE->set_title(get_string('pluginname', 'report_newplugin'));
$PAGE->set_heading(get_string('pluginname', 'report_newplugin'));
$PAGE->set_pagelayout('report');
echo $OUTPUT->header();
$renderable = new report_newplugin_renderable();
$renderer = $PAGE->get_renderer('report_newplugin');
echo $renderer->render($renderable);
echo $renderer->report_course_activity_chart();
echo $OUTPUT->footer();
