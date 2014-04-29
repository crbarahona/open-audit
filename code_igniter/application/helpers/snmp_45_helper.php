<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
#
#  Copyright 2003-2014 Opmantek Limited (www.opmantek.com)
#
#  ALL CODE MODIFICATIONS MUST BE SENT TO CODE@OPMANTEK.COM
#
#  This file is part of Open-AudIT.
#
#  Open-AudIT is free software: you can redistribute it and/or modify
#  it under the terms of the GNU Affero General Public License as published 
#  by the Free Software Foundation, either version 3 of the License, or
#  (at your option) any later version.
#
#  Open-AudIT is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU Affero General Public License for more details.
#
#  You should have received a copy of the GNU Affero General Public License
#  along with Open-AudIT (most likely in a file named LICENSE).
#  If not, see <http://www.gnu.org/licenses/>
#
#  For further information on Open-AudIT or for a license other than AGPL please see
#  www.opmantek.com or email contact@opmantek.com
#
# *****************************************************************************

/**
 * @package Open-AudIT
 * @author Mark Unwin <marku@opmantek.com>
 * @version 1.3
 * @copyright Copyright (c) 2014, Opmantek
 * @license http://www.gnu.org/licenses/agpl-3.0.html aGPL v3
 */

# Vendor BayStack

$get_oid_details = function($details){
	if ($details->snmp_oid == '1.3.6.1.4.1.45.3.30.2') { $details->model = 'BayStack 350-24T switch'; $details->type = 'switch'; }
	if ($details->snmp_oid == '1.3.6.1.4.1.45.3.35.1') { $details->model = 'BayStack 450-24T switch'; $details->type = 'switch'; }
	if ($details->snmp_oid == '1.3.6.1.4.1.45.3.43.1') { $details->model = 'BayStack 420 switch'; $details->type = 'switch'; }
	if ($details->snmp_oid == '1.3.6.1.4.1.45.3.57.2') { $details->model = 'BayStack 425 switch'; $details->type = 'switch'; }

	if ($details->snmp_version == '2') {
		# serial
		$details->serial = snmp_clean(@snmp2_get($details->man_ip_address, $details->snmp_community, "1.3.6.1.4.1.45.1.6.3.1.6.0" ));

		#model
		if (!isset($details->model) or $details->model == '' ) {
			$details->model = snmp_clean(@snmp2_get($details->man_ip_address, $details->snmp_community, "1.3.6.1.4.1.45.1.6.3.1.2.0" ));
		}
	}
};
