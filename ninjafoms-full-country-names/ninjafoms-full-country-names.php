<?php
/**
 * Plugin Name: Ninja Forms - Full Country Names
 * Description: Applies full country names to Ninja Forms country fields (both frontend and backend), and any select field with a class of 'full-iso-country-names'. Works with Ninja Forms 3.0+.
 * Version: 1.0.0
 * Author: Supersonic Playground
 * Author URI: https://www.supersonicplayground.com
 * License: GPLv2+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return full ISO 3166-1 alpha-2 => country name mapping.
 * Full list included.
 *
 * @return array
 */
function nf_full_country_names_list() {
	return [
		"AF"=>"Afghanistan","AX"=>"Åland Islands","AL"=>"Albania","DZ"=>"Algeria","AS"=>"American Samoa",
		"AD"=>"Andorra","AO"=>"Angola","AI"=>"Anguilla","AQ"=>"Antarctica","AG"=>"Antigua and Barbuda",
		"AR"=>"Argentina","AM"=>"Armenia","AW"=>"Aruba","AU"=>"Australia","AT"=>"Austria",
		"AZ"=>"Azerbaijan","BS"=>"Bahamas","BH"=>"Bahrain","BD"=>"Bangladesh","BB"=>"Barbados",
		"BY"=>"Belarus","BE"=>"Belgium","BZ"=>"Belize","BJ"=>"Benin","BM"=>"Bermuda",
		"BT"=>"Bhutan","BO"=>"Bolivia (Plurinational State of)","BQ"=>"Bonaire, Sint Eustatius and Saba","BA"=>"Bosnia and Herzegovina","BW"=>"Botswana",
		"BV"=>"Bouvet Island","BR"=>"Brazil","IO"=>"British Indian Ocean Territory","BN"=>"Brunei Darussalam","BG"=>"Bulgaria",
		"BF"=>"Burkina Faso","BI"=>"Burundi","CV"=>"Cabo Verde","KH"=>"Cambodia","CM"=>"Cameroon",
		"CA"=>"Canada","KY"=>"Cayman Islands","CF"=>"Central African Republic","TD"=>"Chad","CL"=>"Chile",
		"CN"=>"China","CX"=>"Christmas Island","CC"=>"Cocos (Keeling) Islands","CO"=>"Colombia","KM"=>"Comoros",
		"CD"=>"Congo (the Democratic Republic of the)","CG"=>"Congo","CK"=>"Cook Islands","CR"=>"Costa Rica","CI"=>"Côte d'Ivoire",
		"HR"=>"Croatia","CU"=>"Cuba","CW"=>"Curaçao","CY"=>"Cyprus","CZ"=>"Czechia",
		"DK"=>"Denmark","DJ"=>"Djibouti","DM"=>"Dominica","DO"=>"Dominican Republic","EC"=>"Ecuador",
		"EG"=>"Egypt","SV"=>"El Salvador","GQ"=>"Equatorial Guinea","ER"=>"Eritrea","EE"=>"Estonia",
		"SZ"=>"Eswatini","ET"=>"Ethiopia","FK"=>"Falkland Islands (Malvinas)","FO"=>"Faroe Islands","FJ"=>"Fiji",
		"FI"=>"Finland","FR"=>"France","GF"=>"French Guiana","PF"=>"French Polynesia","TF"=>"French Southern Territories",
		"GA"=>"Gabon","GM"=>"Gambia","GE"=>"Georgia","DE"=>"Germany","GH"=>"Ghana",
		"GI"=>"Gibraltar","GR"=>"Greece","GL"=>"Greenland","GD"=>"Grenada","GP"=>"Guadeloupe",
		"GU"=>"Guam","GT"=>"Guatemala","GG"=>"Guernsey","GN"=>"Guinea","GW"=>"Guinea-Bissau",
		"GY"=>"Guyana","HT"=>"Haiti","HM"=>"Heard Island and McDonald Islands","VA"=>"Holy See","HN"=>"Honduras",
		"HK"=>"Hong Kong","HU"=>"Hungary","IS"=>"Iceland","IN"=>"India","ID"=>"Indonesia",
		"IR"=>"Iran (Islamic Republic of)","IQ"=>"Iraq","IE"=>"Ireland","IM"=>"Isle of Man","IL"=>"Israel",
		"IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","JE"=>"Jersey","JO"=>"Jordan",
		"KZ"=>"Kazakhstan","KE"=>"Kenya","KI"=>"Kiribati","KP"=>"Korea (the Democratic People's Republic of)","KR"=>"Korea (the Republic of)",
		"KW"=>"Kuwait","KG"=>"Kyrgyzstan","LA"=>"Lao People's Democratic Republic","LV"=>"Latvia","LB"=>"Lebanon",
		"LS"=>"Lesotho","LR"=>"Liberia","LY"=>"Libya","LI"=>"Liechtenstein","LT"=>"Lithuania",
		"LU"=>"Luxembourg","MO"=>"Macao","MG"=>"Madagascar","MW"=>"Malawi","MY"=>"Malaysia",
		"MV"=>"Maldives","ML"=>"Mali","MT"=>"Malta","MH"=>"Marshall Islands","MQ"=>"Martinique",
		"MR"=>"Mauritania","MU"=>"Mauritius","YT"=>"Mayotte","MX"=>"Mexico","FM"=>"Micronesia (Federated States of)",
		"MD"=>"Moldova (the Republic of)","MC"=>"Monaco","MN"=>"Mongolia","ME"=>"Montenegro","MS"=>"Montserrat",
		"MA"=>"Morocco","MZ"=>"Mozambique","MM"=>"Myanmar","NA"=>"Namibia","NR"=>"Nauru",
		"NP"=>"Nepal","NL"=>"Netherlands","NC"=>"New Caledonia","NZ"=>"New Zealand","NI"=>"Nicaragua",
		"NE"=>"Niger","NG"=>"Nigeria","NU"=>"Niue","NF"=>"Norfolk Island","MK"=>"North Macedonia",
		"MP"=>"Northern Mariana Islands","NO"=>"Norway","OM"=>"Oman","PK"=>"Pakistan","PW"=>"Palau",
		"PS"=>"Palestine, State of","PA"=>"Panama","PG"=>"Papua New Guinea","PY"=>"Paraguay","PE"=>"Peru",
		"PH"=>"Philippines","PN"=>"Pitcairn","PL"=>"Poland","PT"=>"Portugal","PR"=>"Puerto Rico",
		"QA"=>"Qatar","RE"=>"Réunion","RO"=>"Romania","RU"=>"Russian Federation","RW"=>"Rwanda",
		"BL"=>"Saint Barthélemy","SH"=>"Saint Helena, Ascension and Tristan da Cunha","KN"=>"Saint Kitts and Nevis","LC"=>"Saint Lucia","MF"=>"Saint Martin (French part)",
		"PM"=>"Saint Pierre and Miquelon","VC"=>"Saint Vincent and the Grenadines","WS"=>"Samoa","SM"=>"San Marino","ST"=>"Sao Tome and Principe",
		"SA"=>"Saudi Arabia","SN"=>"Senegal","RS"=>"Serbia","SC"=>"Seychelles","SL"=>"Sierra Leone",
		"SG"=>"Singapore","SX"=>"Sint Maarten (Dutch part)","SK"=>"Slovakia","SI"=>"Slovenia","SB"=>"Solomon Islands",
		"SO"=>"Somalia","ZA"=>"South Africa","GS"=>"South Georgia and the South Sandwich Islands","SS"=>"South Sudan","ES"=>"Spain",
		"LK"=>"Sri Lanka","SD"=>"Sudan","SR"=>"Suriname","SJ"=>"Svalbard and Jan Mayen","SE"=>"Sweden",
		"CH"=>"Switzerland","SY"=>"Syrian Arab Republic","TW"=>"Taiwan, Province of China","TJ"=>"Tajikistan","TZ"=>"Tanzania, United Republic of",
		"TH"=>"Thailand","TL"=>"Timor-Leste","TG"=>"Togo","TK"=>"Tokelau","TO"=>"Tonga",
		"TT"=>"Trinidad and Tobago","TN"=>"Tunisia","TR"=>"Türkiye","TM"=>"Turkmenistan","TC"=>"Turks and Caicos Islands",
		"TV"=>"Tuvalu","UG"=>"Uganda","UA"=>"Ukraine","AE"=>"United Arab Emirates","GB"=>"United Kingdom",
		"US"=>"United States","UM"=>"United States Minor Outlying Islands","UY"=>"Uruguay","UZ"=>"Uzbekistan","VU"=>"Vanuatu",
		"VE"=>"Venezuela (Bolivarian Republic of)","VN"=>"Viet Nam","VG"=>"Virgin Islands (British)","VI"=>"Virgin Islands (U.S.)","WF"=>"Wallis and Futuna",
		"EH"=>"Western Sahara","YE"=>"Yemen","ZM"=>"Zambia","ZW"=>"Zimbabwe"
	];
}

/**
 * Replace Ninja Forms country fields values (alpha-2) with full country name
 * before Ninja Forms processes actions (so emails, DB, exports and webhooks receive names).
 */
add_filter( 'ninja_forms_submit_data', function( $form_data ) {
	$countries = nf_full_country_names_list();

	if ( isset( $form_data['fields'] ) && is_array( $form_data['fields'] ) ) {
		foreach ( $form_data['fields'] as $field_id => $field ) {
			// field type may be 'country' for Ninja Forms default country field
			if ( isset( $field['type'] ) && 'country' === $field['type'] && ! empty( $field['value'] ) ) {
				$code = strtoupper( trim( $field['value'] ) );
				if ( isset( $countries[ $code ] ) ) {
					$form_data['fields'][ $field_id ]['value'] = $countries[ $code ];
				} else {
					// If incoming is already a full name (or unknown code), leave it
					$form_data['fields'][ $field_id ]['value'] = $form_data['fields'][ $field_id ]['value'];
				}
			} else {
				// Also attempt to catch selects where admin used 'country' in the key/label: 
				// many custom setups may use 'country' in the key or label — optional heuristic
				if ( ! empty( $field['value'] ) && is_string( $field['value'] ) && strlen( $field['value'] ) === 2 ) {
					$upper = strtoupper( trim( $field['value'] ) );
					if ( isset( $countries[ $upper ] ) ) {
						$form_data['fields'][ $field_id ]['value'] = $countries[ $upper ];
					}
				}
			}
		}
	}

	return $form_data;
}, 20 );

/**
 * Enqueue frontend JS that will convert option labels and values for:
 * - select[data-nf-field-type="country"]
 * - select.full-iso-country-names
 */
function nf_full_country_names_enqueue_script() {
	// only load on frontend pages where forms may appear
	if ( is_admin() ) {
		return;
	}

	wp_register_script(
		'nf-full-country-names',
		plugins_url( 'nf-full-country-names.js', __FILE__ ),
		[ 'jquery' ],
		'1.0',
		true
	);

	// pass mapping to JS
	wp_localize_script( 'nf-full-country-names', 'NF_FULL_COUNTRY_NAMES', nf_full_country_names_list() );
	wp_enqueue_script( 'nf-full-country-names' );
}
add_action( 'wp_enqueue_scripts', 'nf_full_country_names_enqueue_script' );


/**
 * Also enqueue in the customizer preview / ajax loaded areas where forms might render.
 */
add_action( 'wp_enqueue_scripts', function() {
	// fallback: already enqueued above
} );

/**
 * Helper: Output all country options for a <select> with full country names.
 * Usage: echo nf_full_country_names_options( $selected_country );
 */
function nf_full_country_names_options( $selected = '' ) {
    $countries = nf_full_country_names_list();
    $out = '';
    foreach ( $countries as $name ) {
        $sel = ( $selected && $selected === $name ) ? ' selected="selected"' : '';
        $out .= '<option value="' . esc_attr( $name ) . '"' . $sel . '>' . esc_html( $name ) . '</option>';
    }
    return $out;
}